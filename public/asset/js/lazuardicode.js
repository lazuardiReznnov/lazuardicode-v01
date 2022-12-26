function previewImage() {
    const image = document.querySelector("#pic");
    const imgPreview = document.querySelector(".img-preview");
    imgPreview.style.display = "block";

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function (oFREvent) {
        imgPreview.src = oFREvent.target.result;
    };
}

function makeslug(name, slug, link) {
    name.addEventListener("change", function () {
        fetch(link + name.value)
            .then((response) => response.json())
            .then((data) => (slug.value = data.slug));
    });
}
