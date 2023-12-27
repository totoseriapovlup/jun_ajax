document.forms.create.onsubmit = function (e) {
    let me = this;                      //for using this form in callbacks
    let data = new FormData(this);
    let xhr = new XMLHttpRequest();
    xhr.onload = function () {
        if (xhr.status === 201) {
            alert('Note created');
            me.reset();
        }
    };
    xhr.onerror = function () {
        alert('some error');
        console.error(xhr.status + xhr.text);
    };
    xhr.open(this.method, this.action);
    xhr.send(data);
    e.preventDefault();
};