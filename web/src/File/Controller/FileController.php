<?php
/**
 * 去composer里注册
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/23
 * Time: 18:01
 */
namespace File\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FileController
{
    public function indexAction(Request $request)
    {
        $response = new Response();
        if ($request->getMethod() == "POST") {
            $uploadDir = __DIR__."/../../../storage/upload/";
            var_dump($_FILES);
            if (!isset($_FILES['file'])) {
                throw  new \Exception("no file", 101);
            }
            $file = $_FILES['file'];
            switch ($file['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    throw  new \Exception(UPLOAD_ERR_INI_SIZE, 1);
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    throw new \Exception(UPLOAD_ERR_FORM_SIZE, 2);
                    break;
                default:
                    break;
            }
            if (!in_array($file['type'], ["image/png"])) {
                throw new \Exception("not png", 102);
            }
            $tarDir = $uploadDir.time().$file['name'];
            move_uploaded_file($file['tmp_name'], $uploadDir.time().$file['name']);
            echo $tarDir;

        }
        $html = include __DIR__."/../View/file.php";
        $response->setContent($html);

        return $response;
    }

}