<?php
include 'header.php';
$orders = mysqli_query($conn, "SELECT donhang.*, users.name as 'Name' FROM donhang JOIN users ON donhang.id_kh = users.id");
// $donhang = mysqli_query($conn, "SELECT * FROM donhang ");
?>
<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">


                </div>
                <div class="col-md-8">


                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách sản phẩm</h3>
                        </div>
                        <div class="panel-body">

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Tên khách hàng</th>
                                        <th>Tổng tiền</th>
                                        <th>Ngày đặt</th>
                                        <th>Status</th>
                                        <th>Chi tiết đơn hàng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($orders as $key => $data) {?>
                                    <tr>
                                        <td><?php echo $data["id"]?></td>
                                        <td><?php echo $data["Name"] ?></td>
                                        <td><?php echo $data["tongtien"] ?></td>
                                        <td><?php echo $data["ngaytao"]?></td>

                                        <td>
                                            <?php if($data['show'] == 0){?>
                                            <span class="label bg-red">Chưa xử lý</span>
                                            <?php } elseif($data['show'] == 1){?>
                                            <span class="label bg-green">Đang xử lý</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="./chitietdonhang.php?id=<?php echo $data['id']?>"
                                                title="Xem chi tiết"><i class="fa fa-tag"></i></a>
                                        </td>


                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
</div>
<?php include 'footer.php';?>