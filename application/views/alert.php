<?php if ($this->session->flashdata('success')) { ?>
    <div class="alert alert-success" role="alert">
        <?= $this->session->flashdata('success') ?>
    </div>
<?php } ?>
<?php if ($this->session->flashdata('danger')) { ?>
    <div class="alert alert-danger" role="alert">
        <?= $this->session->flashdata('danger') ?>
    </div>
<?php } ?>