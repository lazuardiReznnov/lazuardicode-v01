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

function makeBrand(brand, type, link) {
    brand.addEventListener("change", function () {
        fetch(link + brand.value + "&category=" + category.value)
            .then((response) => response.json())
            .then((response) => {
                const m = response;
                let card = "<option>---Choice Model---</option>";
                m.forEach(
                    (m) =>
                        (card +=
                            '<option value="' +
                            m.id +
                            '">' +
                            m.name +
                            "</option>")
                );
                type.innerHTML = card;
            });
    });
}
