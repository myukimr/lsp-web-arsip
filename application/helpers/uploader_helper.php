<?php

if (!function_exists('doUploadHelper')) {
    function doUploadHelper($fieldname, $upload_path)
    {
        $CI = &get_instance();
        $config = [
            'upload_path' => $upload_path,
            'allowed_types' => 'pdf',
            'max_size' => '0',
        ];
        $CI->load->library('upload');
        $CI->upload->initialize($config);
        print_r($CI->upload->file_type);
        if (!$CI->upload->do_upload($fieldname)) {
            $error = array('error' => $CI->upload->display_errors());
            return ['status' => false, 'log' => $error];
        } else {
            $upload_data = $CI->upload->data();
            return ['status' => true, 'log' => $upload_data];
        }
    }
}
