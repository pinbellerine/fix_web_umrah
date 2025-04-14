document.addEventListener("DOMContentLoaded", function () {
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const previewImg = document.getElementById("previewImage");
                const previewContainer = document.getElementById("previewContainer");

                // Menampilkan gambar yang diunggah
                previewImg.src = e.target.result;
                previewImg.classList.remove("hidden");

                // Sembunyikan teks "Seret dan lepas atau klik untuk pilih gambar"
                previewContainer.classList.add("hidden");
            };
            reader.readAsDataURL(file);
        }
    }

    // Event listener untuk input file
    const fileInput = document.getElementById("fileInput");
    if (fileInput) {
        fileInput.addEventListener("change", previewImage);
    }
});

document.addEventListener("DOMContentLoaded", function () {
    function previewImage2(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const previewImg = document.getElementById("previewImage2");
                const previewContainer = document.getElementById("previewContainer2");

                // Menampilkan gambar yang diunggah
                previewImg.src = e.target.result;
                previewImg.classList.remove("hidden");

                // Sembunyikan teks "Seret dan lepas atau klik untuk pilih gambar"
                previewContainer.classList.add("hidden");
            };
            reader.readAsDataURL(file);
        }
    }

    // Event listener untuk input file
    const fileInput = document.getElementById("fileInput2");
    if (fileInput) {
        fileInput.addEventListener("change", previewImage2);
    }
});

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
  
