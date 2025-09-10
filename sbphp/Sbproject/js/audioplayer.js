// Helper – format seconds as HH:MM:SS
function timeString(secs) {
  let ss = Math.floor(secs),
      hh = Math.floor(ss / 3600),
      mm = Math.floor((ss - hh * 3600) / 60);
  ss = ss - hh * 3600 - mm * 60;
  if (hh > 0) mm = mm < 10 ? "0" + mm : mm;
  ss = ss < 10 ? "0" + ss : ss;
  return hh > 0 ? `${hh}:${mm}:${ss}` : `${mm}:${ss}`;
}

// Update the coloured bar under a range input
function setProgress(el) {
  const pct = Math.min(95, Math.floor(el.value / (el.max / 100)));
  el.nextElementSibling.style.width = pct + "%";
}

// One player per .aWrap
for (const i of document.querySelectorAll(".aWrap")) {
  // Elements
  i.aPlay   = i.querySelector(".aPlay");
  i.aPlayIco= i.querySelector(".aPlayIco");
  i.aNow    = i.querySelector(".aNow");
  i.aTime   = i.querySelector(".aTime");
  i.aSeek   = i.querySelector(".aSeek");
  i.aVolume = i.querySelector(".aVolume");
  i.aVolIco = i.querySelector(".aVolIco");
  i.seeking = false;

  i.aPlay.disabled = false;                           // * NEW *

  // -------- CLICK = first-time init + play/pause --------
  i.aPlay.addEventListener("click", () => {
    // Create the Audio object on the very first click
    if (!i.audio) {
      i.audio = new Audio(encodeURI(i.dataset.src));
      i.audio.preload = "metadata";

      // ---- Event listeners that need the audio object ----
      i.audio.addEventListener("loadedmetadata", () => {
        i.aNow.textContent  = timeString(0);
        i.aTime.textContent = timeString(i.audio.duration);
        i.aSeek.max         = Math.floor(i.audio.duration);
      });

      i.audio.addEventListener("timeupdate", () => {
        if (!i.seeking) i.aSeek.value = Math.floor(i.audio.currentTime);
        i.aNow.textContent = timeString(i.audio.currentTime);
        setProgress(i.aSeek);
      });

      i.audio.addEventListener("play",  () => i.aPlayIco.innerHTML = '<i class="fa fa-pause"></i>');
      i.audio.addEventListener("pause", () => i.aPlayIco.innerHTML = '<i class="fa fa-play"></i>');

      i.audio.addEventListener("canplaythrough", () => {
        i.aVolume.disabled = false;
        i.aSeek.disabled   = false;
      });

      i.audio.addEventListener("waiting", () => {      // keep the play button enabled
        i.aVolume.disabled = true;
        i.aSeek.disabled   = true;
      });

      // --- Seek ---
      i.aSeek.addEventListener("input", () => { i.seeking = true; setProgress(i.aSeek); });
      i.aSeek.addEventListener("change", () => {
        i.audio.currentTime = i.aSeek.value;
        i.seeking = false;
      });

      // --- Volume ---
      i.aVolume.addEventListener("input", () => {
        i.audio.volume = i.aVolume.value;
        i.aVolIco.innerHTML = i.audio.volume == 0
          ? '<i class="fa fa-volume-off"></i>'
          : '<i class="fa fa-volume-up"></i>';
        setProgress(i.aVolume);
      });

      i.aVolIco.addEventListener("click", () => {
        i.audio.volume     = i.audio.volume == 0 ? 1 : 0;
        i.aVolume.value    = i.audio.volume;
        i.aVolIco.innerHTML= i.audio.volume == 0
          ? '<i class="fa fa-volume-off"></i>'
          : '<i class="fa fa-volume-up"></i>';
        setProgress(i.aVolume);
      });
    }

    // Toggle play / pause
    if (i.audio.paused) { i.audio.play(); } else { i.audio.pause(); }
  });
}
