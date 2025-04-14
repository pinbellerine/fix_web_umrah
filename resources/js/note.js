document.addEventListener("DOMContentLoaded", function () {
    const imageUpload = document.getElementById('imageUpload');
  const noteArea = document.getElementById('noteArea');
  const imagePreviewContainer = document.getElementById('imagePreviewContainer');
  const imagePreview = document.getElementById('imagePreview');

  imageUpload.addEventListener('change', function (event) {
    const file = event.target.files[0];
    if (file && file.type.startsWith('image/')) {
      const reader = new FileReader();
      reader.onload = function (e) {
        imagePreview.src = e.target.result;
        noteArea.classList.add('hidden');
        imagePreviewContainer.classList.remove('hidden');
      };
      reader.readAsDataURL(file);
    }
  });
  });
  
