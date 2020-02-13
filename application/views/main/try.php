<table id="table1" style="width:100%">
  
    <tr>
        <th>ID</th>
        <th>Firstname</th>
        <th>Surname</th>
        <th>Lastname</th>
        <th>Age</th>
    </tr>
    
    <?php foreach ($user_table as $user): ?> <!-- each element of the table is called user-->
        <?php echo "<td>".$user['surname']."<td>";?>
        <?php echo "<td>".$user['firstname']."<td>";?> <!--We put inside property that we want-->
        <?php echo "<td>".$user['surname']."<td>";?>
        <?php echo "<td>".$user['dob'."<td>"];?>
        <?php echo "<td>".$user['id_card']."<td>";?>
        

    <?php endforeach; ?>

</table>
