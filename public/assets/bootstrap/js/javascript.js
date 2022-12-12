var btns = document.getElementsByClassName('js-del');
for (let i = 0; i < btns.length; i++) {
    btns[i].addEventListener('click', confirmDel, false);
}

function confirmDel(event) {
    event.preventDefault();
    console.log(event);
    let token = document.getElementsByName("_token")[0].value;
    if (confirm('Deseja mesmo apagar?')) {
        let ajax = new XMLHttpRequest();
        ajax.open("DELETE", event.target.href);
        ajax.setRequestHeader('X-CSRF-TOKEN', token);
        ajax.onreadystatechange = function () {
            if (ajax.readyState === 4 && ajax.status === 200) {
                window.location.href = "book";
            }
        };
        ajax.send();

    } else {
        return false;
    }
}


