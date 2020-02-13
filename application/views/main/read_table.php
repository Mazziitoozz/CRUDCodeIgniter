</br>
</br>
<div class="container">

    <div class="panel-heading">
        <h4 class="text-center"> <strong>Users</strong> </h4>
    </div>
    <table id="table1"  class="table table-fixed table-striped table-hover " >
        <thead class="thead-dark">
            <tr >
                <th scope="col" class="text-center" >ID</th>
                <th scope="col"class="text-center" >Firstname</th>
                 <!--I have to add this th because i dont know why my table save data in odd numbers -->
                <th scope="col" class="text-center">Surname</th>
                <th scope="col" class="text-center">Date of Birthday</th>
                <th scope="col" class="text-center">ID card</th>
                <th scope="col" class="text-center" >Action</th>
                <!-- <th><button id=edit_btn class=edit_btn>Edit</button></th>
                <th><button id=delete_btn class=delete_btn>delete</button></th> -->
                
            </tr>
        </thead>
        <tbody>
    <?php
        foreach ($user_table as $row){?> <!--only the key  
        //for instance :
        //Model-> Controller: keep data in a variable $data['user_table']['ola'] 
        //Controller->View: load-> view('main/main/',$data) 
        //View: only i have to put the key $user_table['ola'] as $row-->
            
            <!-- when you can use < ?php echo it is the same that put < ?= -->
                <tr>
                <td class="text-center"><?=$row['id']?></td>
                <td class="text-center"><?=$row['firstname']?></td>
                <td class="text-center"><?=$row['surname']?></td>
                <td class="text-center"><?=$row['dob']?></td>
                <td class="text-center"><?=$row['id_card']?></td>
                <td class=" text-center"><button class= "edit_btn btn btn-warning">Edit</button> <button class= "delete_btn btn btn-danger">Delete</button></td>
                </tr>
            
           <?php }?>
        </tbody>
        <!-- tfoot is useless because i want to fix the header-->
    </table>
</div>