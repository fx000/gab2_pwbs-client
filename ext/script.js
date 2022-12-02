const setNumber = (e) =>
{
    let key_code = (document) ? e.keyCode : e.which;

    // Jika kode ascii 48 - 57 (0 - 9)
    if ((key_code >= 48 && key_code <= 57) || key_code === 43) {
        return true;
    }else{
        return false;
    }

}