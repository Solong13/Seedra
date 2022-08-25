 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Products List
                                <a href="?page=add" class="btn btn-info float-end"><i class="fas fa-journal-whills"></i></a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Content</th>
                                            <th>Img</th>
                                            <th>Price</th>
                                            <th>ImageLike</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $sql = "SELECT * FROM pro";// не показувати користовачів приховуючи ззаписи
                                        $result = mysqli_query($conn, $sql);
                                        while($row = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['id'] ?></td>
                                                <td><?php echo $row['title'] ?></td> 
                                                <td><?php echo $row['slug'] ?></td>
                                                <td><?php echo $row['content'] ?></td>
                                                <td><?php echo $row['img'] ?></td>
                                                <td><?php echo $row['price'] ?></td>
                                                <td><?php echo $row['imageLike'] ?></td>
                                                <td>   <!-- зсилаємося на ту сторінку де ми зараз знаходимося через GET параметр -->    
                                                    <a href="?page=edit&id=<?php echo $row['id']; ?>"  class="btn btn-warning" ><i class="fas fa-edit"></i>Edit</a>
                                                    <a href="/Seedra/admin/modules/users/deleted.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i>Deleted</a>
                                                </td>
                                            </tr>
                                            
                                            <?php
                                        }
                                    ?>       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                  