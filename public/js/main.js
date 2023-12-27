function fillNotesTable() {
    let notesTableBody = document.querySelector('table#notes tbody');
    let xhr = new XMLHttpRequest();
    xhr.onload = function () {
        let notesJson = xhr.responseText;
        let notes = JSON.parse(notesJson);
        notesTableBody.innerHTML = notes.reduce(function (total, note) {
            return total + `<tr><td>${note.id}</td><td>${note.title}</td><td></td></tr>`;
        }, '');
    };
    xhr.onerror = function () {
        console.error(xhr.status + xhr.text);
    };
    xhr.open('GET', '/api/index');
    xhr.send();
}

fillNotesTable();

document.forms.create.onsubmit = function (e) {
    let me = this;                      //for using this form in callbacks
    let data = new FormData(this);
    let xhr = new XMLHttpRequest();
    // xhr.onreadystatechange = function (){
    //     if(xhr.readyState === 4){
    //         alert(xhr.status);
    //     }
    // };
    xhr.onload = function () {
        if (xhr.status === 201) {
            alert('Note created');
            fillNotesTable();
            me.reset();
        } else if (xhr.status === 400) {
            let _response = JSON.parse(xhr.responseText);
            console.log(xhr.responseText);
            document.getElementById('validation-errors').innerText = _response.error;
        }
    };
    xhr.open(this.method, this.action);
    xhr.send(data);
    e.preventDefault();
};