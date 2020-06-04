function ValidarTela(numero_tela){
    
    var ret = true;
    
    switch(numero_tela) {
        case 1: //tela cadastro
            
            if ($("#nome").val().trim() === "" ) {
                $("#val_nome").show .html("Preencher o campo Nome");
                ret = false;
            } else {
                $("#val_nome").hide();
            }
            
            if ($("#email").val().trim() === "") {
                $("#val_email").show().html("Preencher o campo E-mail");
                ret = false;
            } else {
                $("#val_email").hide();
            }
            
            if($("#senha").val().trim() === "") {
                $("#val_senha").show().html("Preencher o campo Senha");
                ret = false;
            } else if ($("#senha").val().trim().length < 6) {
                $("#val_senha").show().html("A senha deve ter mais de 6 dígitos");
                ret = false;
            } else if ($("#senha").val().trim() !== $("#rsenha").val().trim()) {
                $("#val_senha").show().html("As senhas devem ser iguais");
                ret = false;
            } else {
                $("#val_senha").hide();
            }
            
            break;
            
        case 2: //tela login
            
            if ($("#email").val().trim() === "") {
                $("#val_email").show().html("Preencher o campo Email");
                ret = false;
            } else {
                $("#val_email").hide();
            }
            
            if($("#senha").val().trim() === "") {
                $("#val_senha").show().html("Preencher o campo Senha");
                ret = false;
            } else {
                $("#val_senha").hide();
            }
            
            break;
            
        case 3: //tela criar_anotacao
            
            if($("#titulo").val().trim() === "") {
                $("#val_titulo").show().html("Preencher o campo Título");
                ret = false;
            } else {
                $("#val_titulo").hide();
            }
            
            if($("#anotacao").val().trim() === "") {
                $("#val_anotacao").show().html("Preencher o campo Anotação");
                ret = false;
            } else {
                $("#val_anotacao").hide();
            }
            
            break;
            
        case 4: //tela editar_anotacao
            
            if($("#titulo").val().trim() === "") {
                $("#val_titulo").show().html("Preencher o campo Título");
                ret = false;
            } else {
                $("#val_titulo").hide();
            }
            
            if($("#anotacao").val().trim() === "") {
                $("#val_anotacao").show().html("Preencher o campo Anotação");
                ret = false;
            } else {
                $("#val_anotacao").hide();
            }
            
            break;
    }
    return ret;
}