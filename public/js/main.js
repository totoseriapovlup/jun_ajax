document.forms.create.onsubmit = function (e) {
    let data = new FormData(this);
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                alert('created');
            } else {
                alert('some error');
            }
        }
    };
    xhr.open(this.method, this.action);
    xhr.send(data);

    e.preventDefault();
};