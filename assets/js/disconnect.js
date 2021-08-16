 $(document).ready(function(){

               
                    $("#btn-disconnect").click(function(e){

                        swal({
                          title: "Êtes-vous sûr ??",
                          text: "Vous allez être déconnecté !", 
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#DD6B55",
                          confirmButtonText: "Oui, déconnecté !",
                          cancelButtonText: "Non, annuler !",
                          closeOnConfirm: false,
                          closeOnCancel: false
                        }, 
                        function(isConfirm){
                                     
                          if(isConfirm) {
                                     
                            $.ajax({
                                              
                                url: "core/v1/deconnexion/",
                                type: "GET", // type of method  ,GET/POST/DELETE
                                data: {}, 
                                dataType: 'json',
                                beforeSend: function(){ 
                                    swal.close(); 
                                    $('#processing-modal').modal('show');
                                },
                                success: function(json) {
                                    $('#processing-modal').modal('hide');  
                                    if(json['code'] == 1){
                                        swal({ 
                                                                                                                       
                                          title: 'Succès !',
                                          text: 'Déconnexion réussie !',
                                          type: 'success', 
                                          timer: 3000
                                                                                                     
                                        }, 
                                          function(){ $(location).attr('href',"login");
                                        });
                                    }else{
                                      swal('Erreur !', 'Echec de la déconnexion !', 'error'); 
                                    }     
                                },
                                error: function(jqXHR,error, errorThrown) {  
                               
                                } 
                                                 
                            });
                                           
                          }
                          else {
                            swal("Annulé !", "Déconnexion annulée !", "error"); 
                          }

                        });

                    });

                    
                });
