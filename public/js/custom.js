let change = (el) => {
    let size = el.files[0].size / 1024;
    if (size > 3 * 1024) {
        alert('Image so big,pls upload image not bigger 3MB');
        document.querySelector('#image').value = "";
        return false;
    }
    let input = document.createElement("input");
    let status = document.createElement('P');
    status.style.color = 'green';
    status.style.display = 'none';
    status.id = 'status';
    input.type = "file";
    input.accept = ".png, .jpg, .jpeg";
    input.className = "form-control-file";
    input.name = el.name;
    input.setAttribute('onchange', 'change(this)');
    form = document.getElementById('form');
    form.appendChild(input);
    form.appendChild(status);

    let formData = new FormData();
    formData.append('image', document.querySelector('#image').files[0]);
    formData.append('id', document.getElementById('profileId').value);

    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('status').style.display = 'block';
            document.getElementById('status').innerText = this.responseText;
            document.getElementById('status').setAttribute('id', '');
        }
    };
    xhr.open('POST', '/photo/store', true);
    xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').content);

    xhr.onload = function (e) {
    };
    xhr.send(formData);

    el.style.pointerEvents = "none";
    el.name = '';
};

let mainpage = () => {
    let APP_URL = window.location.origin;
    window.location.href = APP_URL;
};


let destroyPhoto = (el) => {
    //console.log(el.dataset.path);
    let formData = new FormData();
    formData.append('path', el.dataset.path);

    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(el.dataset.path).style.display = 'none';

        }
    };
    xhr.open('POST', '/photo/destroy', true);
    xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').content);

    xhr.onload = function (e) {
    };
    xhr.send(formData);
};

let restrict = (tb) => {
    tb.value = tb.value.replace(/[^a-zA-Z0-9@]/g, '');
};


