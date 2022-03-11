<?php
get_header();
?>
<?php get_sidebar(); ?>
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Báo cáo</h5>
                        <p class="m-b-0">Báo cáo chi trả cổ đông</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?mod=home"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Báo cáo</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Báo cáo chi trả cổ đông</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <!-- Page-header end -->
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-md-12">

                            <!-- Hover table card start -->
                            <div class="card">
                                <div class="card-header">
                                    <!-- <a class ="add-button" href="?mod=account&action=addAccount">Thêm tài khoản ngân hàng mới</a> -->
                                    <!-- <span>use class <code>table-hover</code> inside table element</span> -->
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                            <li><i class="fa fa-window-maximize full-card"></i></li>
                                            <li><i class="fa fa-minus minimize-card"></i></li>
                                            <li><i class="fa fa-refresh reload-card"></i></li>
                                            <li><i class="fa fa-trash close-card"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block table-border-style">
                                    <form method="POST">
                                        <div class="d-flex mb-3">
                                            <div class="form-inline" style="margin-right: 30%">
                                                <label for="from_date" class="mr-2">Từ</label>
                                                <input class="form-control" type="date" name="from_date" id="from_date" value="<?php echo set_value('from') ?>">
                                            </div>
                                            <div class="form-inline mr-5">
                                                <label for="to_date" class="mr-2">Đến</label>
                                                <input class="form-control" type="date" name="to_date" id="to_date" value="<?php echo set_value('to') ?>">
                                            </div>

                                            <?php echo form_error('date') ?>
                                            <button type="submit" name="btn-search-report" id="btn-search-report" class="btn btn-success">Tìm kiếm</button>
                                        </div>
                                    </form>
                                    <?php 
                                    if(count($data)>0)
                                    {
                                        ?>               
                                        <button   class="btn btn-info mb-3" name ="btnExport" id="btnExport_index" onclick="btn_export()">Xuất file </button>
                                        <?php
                                    }
                                    ?>
                                    <!-- <?php
                                            //  show_array($data);
                                            ?> -->
                                    <div class="table-responsive">
                                        <table class="table table-hover" id ="table-index">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Cổ đông</th>
                                                    <th>Là cổ đông tàu</th>
                                                    <th>Tổng tiền VNĐ</th>
                                                    <th>Tổng tiền $</th>
                                                    <th class="text-center">Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $i = 1;
                                                foreach ($data as $item) {
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $i ?></th>
                                                        <td><?php echo ($item['user_lname'] . " " . $item['user_mname'] . " " . $item['user_fname']) ?></td>
                                                        <td>
                                                            <?php
                                                            foreach ($item['ship'] as $item1) {
                                                                # code...
                                                                echo ($item1['name'] . ", ");
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo (number_format( $item['tong_tien_vnd'], 2, ',', ' ')) ?></td>
                                                        <td><?php echo (number_format( $item['tong_tien_USD'], 2, ',', ' ')) ?></td>
                                                        <td class="text-center">
                                                            <span class="watch_detail" style="cursor: pointer" data-id="<?php echo $item['id'] ?>" class="mr-2 change_ledger" title="Chi tiết" data-id="<?php echo $item['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></span>

                                                        </td>
                                                    </tr>
                                                <?php
                                                    $i = $i + 1;
                                                }
                                                ?>
                                                <tr style="color: #000;font-size:18px;font-weight:600;">
                                                    <td colspan="3">Tổng tiền</td>
                                                    <td><?php echo(number_format($sum_vnd, 2, ',', ' ')) ?></td>
                                                    <td><?php echo(number_format($sum_usd, 2, ',', ' ')) ?></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Hover table card end -->
                            <!-- Cấu trưc modal -->
                            <div class="modal fade" id="modal-watch-detail">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                
                                            </h5>
                                            <button class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <!-- and modal-header	 -->
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>STT</th>
                                                                    <th>Thời gian</th>
                                                                    <th>Loại thu/chi</th>
                                                                    <th>Số tiền</th>
                                                                    <th>Loại tiền</th>
                                                                    <th>Tài khoản</th>
                                                                    <th>Mô tả</th>
                                                                    
                                                                </tr>

                                                            </thead>
                                                            <tbody id ="t-body">

                                                            </tbody>
                                                        </table>
                                              
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- end modal-body -->
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- end-modal -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<script>
    function btn_export() {
        var from =$("input#from_date").val();
         var to =$("input#to_date").val();
        var table1 = document.querySelector("#table-index");
        var opt = {
            rowIndex: 4
        }; //开头空4行
        var sheet = XLSX2.utils.table_to_sheet(table1, opt);
        sheet["B1"] = {
            t: "s",
            v: 'Thống kê chi trả cổ đông' 
        }; //给A1单元格赋值
        sheet["B4"] = {
            t: "s",
            v: 'Từ ngày ' + formatDateInJS(from) + ' đến ngày ' + formatDateInJS(to) 
        };
        sheet["B4"].s = {
            font: {
                name: 'Times New Roman',
                sz: 14,
                bold: true,
            },
            alignment: {
                horizontal: "center",
                vertical: "center",
                wrap_text: true
            },
        };
        sheet["B1"].s = {
            font: {
                name: 'Times New Roman',
                sz: 24,
                bold: true,
                underline: true,
                color: {
                    rgb: "FFFFAA00"
                }
            },
            alignment: {
                horizontal: "center",
                vertical: "center",
                wrap_text: true
            },
        };
        //["!merges"]这个属性是专门用来进行单元格合并的 
        sheet["!merges"].push({ //如果不为空push 为空 = 赋值
            //合并单元格 index都从0开始
            s: { //s开始
                c: 1, //开始列
                r: 0 //开始行
            },
            e: { //e结束
                c: 4, //结束列
                r: 2 //结束行
            }
        });
        sheet["!merges"].push({ //如果不为空push 为空 = 赋值
            //合并单元格 index都从0开始
            s: { //s开始
                c: 1, //开始列
                r: 3 //开始行
            },
            e: { //e结束
                c: 4, //结束列
                r: 3 //结束行
            }
        });
        sheet["!cols"] = [{
            wpx: 70
        }, {
            wpx: 150
        }, {
            wpx: 200
        }, {
            wpx: 150
        }, {
            wpx: 150
        }]; //单元格列宽
        sheet["A5"].s = { //样式
            font: {
                sz: 13,
                bold: true,
            },
            alignment: {
                // horizontal: "center",
                vertical: "center",
                wrap_text: true
            }
        };
        sheet["B5"].s = { //样式
            font: {
                sz: 13,
                bold: true,
            },
            alignment: {
                // horizontal: "center",
                vertical: "center",
                wrap_text: true
            }
        };
        sheet["C5"].s = { //样式
            font: {
                sz: 13,
                bold: true,
            },
            alignment: {
                // horizontal: "center",
                vertical: "center",
                wrap_text: true
            }
        };
        sheet["D5"].s = { //样式
            font: {
                sz: 13,
                bold: true,
            },
            alignment: {
                // horizontal: "center",
                vertical: "center",
                wrap_text: true
            }
        };
        sheet["E5"].s = { //样式
            font: {
                sz: 13,
                bold: true,
            },
            alignment: {
                // horizontal: "center",
                vertical: "center",
                wrap_text: true
            }
        };
        openDownloadDialog(sheet2blob(sheet), 'Bao_cao_chi_tra_co_dong.xlsx');
    }
</script>
<?php get_footer(); ?>