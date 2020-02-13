
$(document).ready(function(){ //when docuemnt has been loaded then you can do:
   
    $('#send').click(
        function(){
            $.ajax(
                {
                    url: "http://localhost/MazoProject/index.php/insert", //you put tu url of your function 
                    method:'POST',                  //here you put the method
                    data: { 
                        "firstname":$('#firstname').val(),     // left you have to put the names in the table             
                        "surname": $('#surname').val() ,       // right you have to put the values that you want too insert
                        "dob": $('#age').val() ,
                        "id_card":$('#idcard').val() ,
                    },
                    success:function(result){

                    //I would like that when you click on send values are empty
                        $("#firstname").val("");
                        $("#surname").val("");
                        $("#age").val("");
                        $("#idcard").val("");

                        refresh(); // refresh the page without reload
                    } 
                }
            )
                
                
        }
    )

    
    //clear the values
    $('#clear').click(
        function(){
            $("#firstname").val("");
            $("#surname").val("");
            $("#age").val("");
            $("#idcard").val("");

        }
    )
    //We use $('.') because we want to find a class
    $('.edit_btn').click(
    
        function(){
        
        // side and show some buttons and change text in their cells
        $('#send').hide();
        $('#update').removeClass('d-none') //we use it becasue we are using bootstrap
        $('#title').hide();
        $('.id_user').show();//not necessary
        
        alert ('you are going to update this value')

        // we said that we want to the all parents of this element and we want to find one called td and get the first position of all of parents with tag td
        $id=$(this).parents("tr").find("td:eq(0)").text(),   
        $firstname=$(this).parents("tr").find("td:eq(1)").text();
        $surname=$(this).parents("tr").find("td:eq(2)").text();
        $dob=$(this).parents("tr").find("td:eq(3)").text();
        $idcard=$(this).parents("tr").find("td:eq(4)").text();

        //send data to input buttons
        $('#id1').val($id); //it is hidden
        $('#firstname').val($firstname);
        $('#surname').val($surname);
        $('#age').val($dob);
        $('#idcard').val($idcard);

        
        //console.log($id) ;to check that we have this dta
       
        }
    )


    // Update a user
    $('#update').click(
        function(){
            
            $.ajax(
                {
                    url: "http://localhost/MazoProject/index.php/users/update",
                    method:'POST',
                    data: { 
                        //Change value of these tag with id
                        "id":$('#id1').val() , //send information of the id to hidden button
                        "firstname":$('#firstname').val(),                  
                        "surname": $('#surname').val() , 
                        "dob": $('#age').val() ,
                        "id_card":$('#idcard').val() ,  
                        
                    },
                    success:function(result){
                        $("#id1").val("");
                        $("#firstname").val("");
                        $("#surname").val("");
                        $("#age").val("");
                        $("#idcard").val("");
                        refresh();
                
                    } 
                }

            )
        }
    )

    //delete a user
    $('.delete_btn').click(
        function(){
            $id=$(this).parents("tr").find("td:eq(0)").text(),   //we are interested in deleting information of the person whith this id
            // $firstname=$(this).parents("tr").find("td:eq(1)").text();
            // $surname=$(this).parents("tr").find("td:eq(3)").text();
            // $dob=$(this).parents("tr").find("td:eq(5)").text();
            // $idcard=$(this).parents("tr").find("td:eq(7)").text();
            $('#id1').val($id);
            
            // console.log($dob);
            
            $.ajax(
                {
                    url: "http://localhost/MazoProject/index.php/users/delete",
                    method:'POST',//here you put the method
                    data: { 
                        //Change value of these tag with id
                        "id":$('#id1').val() , 
                        
                    },
                    success:function(){
                        
                        refresh()
                        
                    
                
                    } 
                }

            )
        }
    )

    //Function to refresh page without reload
    function refresh(){
        $.ajax(
            {
                url: "http://localhost/MazoProject/index.php/users/read",
                method:'POST',//it doesnt mind the method
                     
            success: function(response)
            {
                $("body").html(response); //.html() can be used to get the contents of any element.
               
            }
        }
        )
        
    } 

    var mytable = $('#table1').DataTable({
        fixedHeader: true,
        dom: 'Bfrtip',
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            {
                extend: 'pageLength',
                text:      '<i class="fa fa-print"></i>',
                messageTop: 'Users of Buzz Gym by Mazo',
            },
            
          
            {
                extend: 'print',
                text:      '<i class="fa fa-print"></i>',
                messageTop: 'Users of Buzz Gym by Mazo',
            },
            {
                extend: 'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF',
                title: 'Users Buzz Gym',
               
                messageTop: 'Users of Buzz Gym by Mazo',
                alignment:'center',
                customize: function ( doc ) {
                    doc.content.splice( 1, 0, {
                        margin: [ 30, 0, 0, 20 ],
                        alignment: 'center',
                        image: 'data:image/png;base64,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',
                    });
                }
            },
            {
                extend: 'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel',
                title: 'Users Buzz Gym',
                autoFilter:true,
                sheetName: 'Users of Buzz Gym' //Name of the page in Excell
            } ,
            {
                extend: 'copy',
                text:      '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy',
                
            },
        
        ]
        
         
        });


    
    

});