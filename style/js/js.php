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
	

            
</script>