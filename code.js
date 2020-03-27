function addrow() {
    var rowcount = document.getElementById("RowVal");
    var colcount = document.getElementById("ColVal");
    var matrix = document.getElementsByClassName("matrix");

    var row = '<div class="row">'
    for (var i = 0; i < colcount.value; i++) {
        row += ' <div class="column"><input class="number" type="number"></div> ';
    }
    row += '</div>'

    matrix[0].innerHTML += row;
    rowcount.value++;
}

function addcol() {
    var rowcount = document.getElementById("RowVal");
    var colcount = document.getElementById("ColVal");
    var rows = document.getElementsByClassName("row");

    for (var i = 0; i < rowcount.value; i++) {
        rows[i].innerHTML += ' <div class="column"><input class="number" type="number"></div> ';
    }
    colcount.value++;
}

function delrow() {
    var rowcount = document.getElementById("RowVal");
    var rows = document.getElementsByClassName("row");
    if (rowcount.value > 0) {
        rows[rowcount.value - 1].parentNode.removeChild(rows[rowcount.value - 1]);
        rowcount.value--;
    } else {
        alert("Cannot remove row!");
    }
}

function delcol() {
    var rowcount = document.getElementById("RowVal");
    var colcount = document.getElementById("ColVal");
    var cols = document.getElementsByClassName("column");
    var m = rowcount.value;
    var n = colcount.value;

    if (colcount.value > 0) {

        for (var i = m; i >= 1; i--) {
            cols[n * i - 1].parentNode.removeChild(cols[n * i - 1]);
        }
        colcount.value--;

    } else {
        alert("Cannot remove column!");
    }
}

function submitMatrix() {
    var rowcount = document.getElementById("RowVal");
    var colcount = document.getElementById("ColVal");

    var matrix = new Array(rowcount.value);
    for (var i = 0; i < rowcount.value; i++) {
        matrix[i] = new Array(colcount.value);
    }

    var values = document.getElementsByClassName("number");
    var k = 0;
    for (var i = 0; i < rowcount.value; i++) {
        for (var j = 0; j < colcount.value; j++) {
            matrix[i][j] = values[k].value;
            k++;
        }
    }
    getImageFromServer(matrix);
}

function getImageFromServer(matrix) {
    const formData = new FormData();

    formData.append('data', matrix);
    formData.append('name', "M");

    axios.post("generate.php", formData).then(res => {
        console.log(res);
    })
}