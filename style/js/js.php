<?php if(!defined('BASEPATH')) exit('Falha no carregamento do script!'); ?>



<script src="<?=BASEJS?>jquery-1.7.js" type="text/javascript"></script>
<script src="<?=BASEJS?>jquery-1.8.js" type="text/javascript"></script>	
<script src="<?=BASEJS?>jquery.gotop.min.js" type="text/javascript"></script>
        
<script src="<?=BASEJS?>jquery.dataTables.js" type="text/javascript"></script>
<script type="text/javascript">
		$(function(){
			$('#top').gotop();
                    
                   
                    });
                        var oTable;
			var bs = false;
			/*function selecionado(x){
					$(x).addClass('gradeA');
				
				}
			function n_selecionado(x){
					$(x).removeClass('gradeA');
				}*/
			
			$(document).ready(function() {
				/* Add a click handler to the rows - this could be used as a callback */
                                /* Add/remove class to a row when clicked on */
                                /*
                                $('#usuario tr').click( function() {
                                    $(this).toggleClass('row_selected');
                                 } );*/
                                /*$('#editarUsu').hide();
                                $('#deletarUsu').hide();
                                 */   
				/*$("#usuario tbody tr").click( function() {
					if ( $(this).hasClass('row_selected') ) {
						$(this).removeClass('row_selected');
						
							 bs = false;
                                                         
					}
					else {
						oTable.$('tr.row_selected').removeClass('row_selected');
						$(this).addClass('row_selected');
						 bs = true;
					}
                                        if(bs){                                            
                                           
                                        }
                                        else{
                                            
                                        }*/
                                      /*var check = oTable.$('input').serialize();*/
                                      /*if(check !=''){ 
                                          
                                          $('#editarUsu').show();
                                          $('#deletarUsu').show();
                                      }
                                      else{
                                          $('#editarUsu').hide();
                                          $('#deletarUsu').hide();
                                      }
                                      
                                       
				});*/
                        
			/* Init the table */
                        oTable = $('#usuario').dataTable(  {
					"sScrollY": 200,
					"sScrollX": "100%",
					"sScrollXInner": "100%"
                        	});
			
			}); 
			
			/* Get the rows which are currently selected */
			function fnGetSelected( oTableLocal )
			{
				return oTableLocal.$('tr.row_selected');
			}
	

          $(function(){
     
         //oTable = $('#usuario');
	/*$('body').on('click', '#usuario tbody td', function () {
        /*Obtém a posição da célula clicada 
        var aPos = oTable.fnGetPosition(this);

       /*Obtém o array com os dados da linha clicada
        var aData = oTable.fnGetData(aPos[0]);


        });*/

       $('.add').click( function () {
               /*Obtém a posição da célula clicada */
        var aPos = oTable.fnGetPosition(this);

       /*Obtém o array com os dados da linha clicada*/
        var aData = oTable.fnGetData(aPos[0]);
       
       adicionar(aData[0],aData[2],$('.material'));

       });

       var arr = new Array();
       var i = 0;
       
       /*Script para adicionar e remover campo*/
       
        function adicionar(nome,grupo,div){
            //alert(nome);
          var flag = false;   
             //arr[i] = [nome,grupo];
             
           for(var x=0; x < arr.length; x++){
                 
            if(nome == arr[x][0] && grupo == arr[x][1]){
                    flag = true;
                    break;
                 } 
                 
             }
             
             if(!flag){
                
             
                $('<tr>'
                   +'<td><input name="nome[]" type="text" value="'+ nome  +'" readonly="readonly" style=" width: 162px; height: 35px;" /></td>'
                   +'<td><input name="grupo[]" type="text" value="'+ grupo  +'" readonly="readonly" style=" width: 162px; height: 35px;" /></td>'
                   +'<td><input type="number" name="qnt[]" value="1"/></td>'
                   +'<td><a href="#" id="'+i+'" class="remove">Remove</a></td>'
                   +'</tr>')
                   .appendTo(div);
                 arr[i] = [nome,grupo];
                 i++;
                }  
            }

          $('.remove').live('click', function() { 
                               $(this).parents('tr').remove();
                            var id =  $(this).attr('id');
                               delete arr[id][0];
                               delete arr[id][1];
 
               });
       });  
</script>