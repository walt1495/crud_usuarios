$(document).ready(function(){

$("#btnAgregar").on('click',function(e){
	e.preventDefault();
	var url = 'index.php?c=user&a=insertar';
	$.ajax({
		url:url,
		type:'POST',
		dataType:'json',
		data:$("#form-agregar").serialize(),
		success:function(res){
			if(res.ok){
				alert('Usuario Agregado Satisfactoriamente');
				$("#btnLimpiar").click();
			}else{
				$("#" + res.id).focus();
				alert(res.msj);
			}
		}
	});
});

$("#btnEditar").on('click',function(e){
	e.preventDefault();
	var url = 'index.php?c=user&a=registar_modificacion';
	$.ajax({
		url:url,
		type:'POST',
		dataType:'json',
		data:$("#form-editar").serialize(),
		success:function(res){
			if(res.ok){
				alert('Usuario Editado Satisfactoriamente');
				window.location = 'index.php?c=user';
			}else{
				alert(res.msj);
			}
		}
	});
});

});

function eliminar(id){
	event.preventDefault();
	var url = 'index.php?c=user&a=eliminar';

	var rpt = confirm('¿Estas seguro de eliminar este usuario?');
	if(rpt){
		var tr = event.target.parentNode.parentNode;
		$.ajax({
			url:url,
			type:'GET',
			dataType:'json',
			data:{id:id},
			success:function(res){
				if(res.ok){
					alert('Usuario Eliminado Satisfactoriamente');
					$(tr).css('display','none');
					//window.location = 'index.php';
				}else{
					alert(res.msj);
				}
			}
		});
	}

	
}
