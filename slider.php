<!-- Main News Slider Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-7 px-0">
            <div class="owl-carousel main-carousel position-relative">
                <?php
                $get3NewItem = $Item->getNewItem(0, 3);
                foreach ($get3NewItem as $key => $value):
                    $cateName = $Categogy->getCateNameByID($value['category'])[0]['name'];
                    $createdAt = $value['created_at'];
                    $formattedDate = date('M d,Y', strtotime($createdAt));
                    //var_dump($get3NewItem);
                ?>
                    <div class="position-relative overflow-hidden" style="height: 500px;">
                        <img class="img-fluid h-100" src="img/<?php echo $value['image'] ?>" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href=""><?php echo $cateName ?></a>
                                <a class="text-white" href=""><?php echo $formattedDate; ?></a>
                            </div>
                            <a class="h2 m-0 text-white text-uppercase font-weight-bold" href=""><?php echo $value['excerpt'] ?></a>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="col-lg-5 px-0">
            <div class="row mx-0">
                <?php
                $get4NewItem = $Item->getNewItem(3, 4);
                foreach ($get4NewItem as $key => $value):
                    $cateName = $Categogy->getCateNameByID($value['category'])[0]['name'];
                    $createdAt = $value['created_at'];
                    $formattedDate = date('M d,Y', strtotime($createdAt));
                ?>
                    <div class="col-md-6 px-0">
                        <div class="position-relative overflow-hidden" style="height: 250px;">
                            <img class="img-fluid w-100 h-100" src="img/<?php echo $value['image'] ?>" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href=""><?php echo $cateName ?></a>
                                    <a class="text-white" href=""><?php echo $formattedDate; ?></a>
                                </div>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href=""><?php echo $value['excerpt'] ?></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<!-- Main News Slider End -->