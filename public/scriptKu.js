
// function delete beberapa item

// id item disimpan dalam bentuk array
var $delete = [];

// jika checkbox dengan id = ID ter-check
// maka ID akan dimasukkan ke dalam array $delete
// jika checkbox dengan id = ID tidak ter-chek / uncheck
// maka ID akan dihapus dari dalam array $delete
function deleteData($id) {
    if (document.getElementById($id).checked == true) {
        $delete.push($id);
        console.log($delete);
    }
    if (document.getElementById($id).checked == false) {
        $index = $delete.indexOf($id);
        $delete.splice($index, 1);
        console.log($delete);
    }
    // memasukkan nilai/value dari array $delete ke input hidden
    // dengan nama deleteID
    // kemudian di POST ke Controller
    $('input:hidden[name="deleteID"]').val($delete);
    // text untuk modal confirmation
    document.getElementById("modalBody").innerHTML = 'Apakah anda yakin ingin menghapus ' + ($delete.length) + ' data?';
}
// =======================================================================

// function back
function goBack() {
    history.back();
}
// =======================================================================

// function back 2 halaman
function goBack() {
    history.back();
}
// =======================================================================

// function validasi confirm password

// =======================================================================

