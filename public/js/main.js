
   $(document).ready(function() {
    $('#example').DataTable();
     

     } );

    
                    $(document).on('click', '#submitbtn', function (e) {
                        e.preventDefault();
                         var firstname = $('#inputfirstname').val();
                         var lastname = $('#inputlastname').val();
                         var email = $('#inputemail').val();
                         var dob = $('#inputdob').val();
                         var legal = $('#inputlegal').val();
                         var inputcase = $('#inputcase').val();

                         if (firstname == '') {
                         $('#inputfirstname').css('border' ,  '2px solid firebrick');
                         return false;
                         }else if (lastname == '') {
                         $('#inputlastname').css('border' ,  '2px solid firebrick');
                         $('#inputfirstname').css('border' ,  '2px solid green');
                         return false;
                         }
                         else if (email == '') {
                         $('#inputemail').css('border' ,  '2px solid firebrick');
                         $('#inputfirstname').css('border' ,  '2px solid green');
                         $('#inputlastname').css('border' ,  '2px solid green');

                         return false;
                         }

                         else if (dob == '') {
                         $('#inputdob').css('border' ,  '2px solid firebrick');
                         $('#inputfirstname').css('border' ,  '2px solid green');
                         $('#inputlastname').css('border' ,  '2px solid green');
                         $('#inputemail').css('border' ,  '2px solid green');

                         return false;
                         }
                         else if (legal == '') {
                         $('#inputlegal').css('border' ,  '2px solid firebrick');
                         $('#inputfirstname').css('border' ,  '2px solid green');
                         $('#inputlastname').css('border' ,  '2px solid green'); 
                         $('#inputemail').css('border' ,  '2px solid green');            
                         $('#inputdob').css('border' ,  '2px solid green');
                         return false;
                         }

                         else if (inputcase == '') {
                         $('#inputcase').css('border' ,  '2px solid firebrick');
                         $('#inputfirstname').css('border' ,  '2px solid green');  
                         $('#inputlastname').css('border' ,  '2px solid green');        
                         $('#inputemail').css('border' ,  '2px solid green');          
                         $('#inputdob').css('border' ,  '2px solid green');             
                         $('#inputlegal').css('border' ,  '2px solid green');
                         return false;
                         }else{
                          $('#inputcase').css('border' ,  '2px solid firebrick');
                         $('#inputfirstname').css('border' ,  '2px solid green');  
                         $('#inputlastname').css('border' ,  '2px solid green');        
                         $('#inputemail').css('border' ,  '2px solid green');          
                         $('#inputdob').css('border' ,  '2px solid green');             
                         $('#inputlegal').css('border' ,  '2px solid green');

                         $('#inputcase').css('border' ,  '2px solid green');
                         



							   var data = {
							   firstname: firstname,
							   lastname:lastname,
							   email:email,
							   dob:dob,
							   legal:legal,
							   casedesc:inputcase
							   }

						      $.ajaxSetup({
					         headers: {
					          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					           }
					           });
			             
							 $.ajax({
							    url: "/create_record",
							    type: 'POST',
							    data : JSON.stringify(data),
							    contentType : 'application/json',
							    success: function (data) {
						    	 if (data.status == 200) {
	 $('#msg').fadeIn().html("<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+data.msg+"</div>");
				    setTimeout(function() {
				    $('#msg').fadeOut(); }, 3000); 
				    $("input").val('');
				    $("input").css('border' ,  '1px solid #babfc7');


	                    console.log(data);
			                  

				    	}else if (data.status == 404) {

                  		   
	 $('#msg').fadeIn().html("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+data.msg+"</div>");
				    setTimeout(function() {
				    $('#msg').fadeOut(); }, 3000); 
                       $('#btn-bvn').removeClass("disabled");
                        $('#spin').hide();
                       console.log(data.status);
			    		
			    	}
                 
			       },


			     error: function (data) { 
			     		   
	  $('#msg').fadeIn().html("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+data.msg+"</div>");
				    setTimeout(function() {
				    $('#msg').fadeOut(); }, 3000); 
			    	 
			    		console.log(data.status);
			    	 }
			        });

          }
                     
             });
