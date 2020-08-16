$(document).on('click','.toggleFullscreenImage', event => toggleFullscreenImage(event));

function toggleFullscreenImage(e) 
{
     let elem = e.target,
          imgSrc = elem.getAttribute('src');
     
     if (imgSrc.includes('no-photo.png') || !imgSrc)
       return;

     if (!document.fullscreenElement) {
       elem.requestFullscreen().catch(err => {
         alert(`Error attempting to enable full-screen mode: ${err.message} (${err.name})`);
       });
     } else {
       document.exitFullscreen();
     }
} 
