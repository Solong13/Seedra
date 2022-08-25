 
 
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Users List
                                <a href="?page=add" class="btn btn-info float-end"><i class="fas fa-journal-whills"></i></a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>user</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>role</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        $sql = "SELECT * FROM users";// не показувати користовачів приховуючи ззаписи
                                        $result = mysqli_query($conn, $sql);
                                        while($row = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['id'] ?></td>
                                                <td><?php echo $row['user'] ?></td> 
                                                <td><?php echo $row['Email'] ?></td>
                                                <td><?php echo $row['Password'] ?></td>
                                                <td><?php echo $row['role'] ?></td>
                                            <td>   <!-- зсилаємося на ту сторінку де ми зараз знаходимося через GET параметр -->    
                                                <a href="?page=edit&id=<?php echo $row['id']; ?>"  class="btn btn-warning" ><i class="fas fa-edit"></i>Edit</a>
                                                <a href="/Seedra/admin/modules/users/deletedOfUsers.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i>Deleted</a>
                                            </td>
                                            </tr>
                                            
                                    <?php
                                        }
                                    ?>       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                  