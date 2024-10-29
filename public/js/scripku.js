var modal = document.getElementById('myModal');
var btn = document.getElementById("tombolku");
var span =document.getElementById("tutup");

btn.onclick = function(){
    modal.style.display = "block";
}
span.onclick = function(){
    modal.style.display = "none";
}
window.onclick = function(e){
    if (e.target == modal){
        modal.style.display = "none";
    }
}

function brand()
        {
        if (document.form1.nama.value=="")
            {
                alert("anda belum memasukan brand");
            }
        }

function model()
    {
    if (document.form1.nama.value=="")
            {
                alert("anda belum memasukan model");
            }
    }

    function ram()
    {
    if (document.form1.nama.value=="")
            {
                alert("anda belum memasukan ram");
            }
    }

    function processor()
    {
    if (document.form1.nama.value=="")
            {
                alert("anda belum memasukan processor");
            }
    }



    
   
    
    