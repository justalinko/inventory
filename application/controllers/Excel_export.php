<?php

defined('BASEPATH') OR exit('No direct script access allowed');

  class Excel_export extends CI_Controller {

public function __construct()
{
  parent::__construct();

  require_once(APPPATH.'/third_party/Excel/PHPExcel.php');
}

    public function supplier(){


      $queris = $this->db->get('supplier');

      $object = new PHPExcel();

      $object->setActiveSheetIndex(0);

      $table_columns = array("No." , "Nama supplier", "Alamat" , "Kota", "Telphone" , "HP" , "PIC","Email","Website","Note");

      $column = 0;

      foreach($table_columns as $field){

        $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);

        $column++;

      }

      

      $excel_row = 2;
      $no = 1;
      foreach($queris->result() as $row){

        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row,$no++);
        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->nama);
        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->alamat);
        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->kota);
        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->phone);
        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->hp);
        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->email);
        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->note);
        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->website);
        $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->pic);


        $excel_row++;

      }

      $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');

      header('Content-Type: application/vnd.ms-excel');

      header('Content-Disposition: attachment;filename="Supplier-'.date('d_m_Y').'.xls"');

      $object_writer->save('php://output');

    }

    public function  customer()
    {

      $queris = $this->db->get('customer');

      $object = new PHPExcel();

      $object->setActiveSheetIndex(0);

      $table_columns = array("No." , "Nama Customer", "User" , "Divisi", "Telephone" , "HP" ,"Email","Website","Note");

      $column = 0;

      foreach($table_columns as $field){

        $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);

        $column++;

      }

      

      $excel_row = 2;
      $no = 1;
      foreach($queris->result() as $row){

        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row,$no++);
        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->nama_lengkap);
        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->username);
        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->divisi);
        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->phone);
        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->hp);
        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->email);
        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->website);
        $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->website);


        $excel_row++;

      }

      $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');

      header('Content-Type: application/vnd.ms-excel');

      header('Content-Disposition: attachment;filename="Customer-'.date('d_m_Y').'.xls"');

      $object_writer->save('php://output');
    }



    public function barang()
    {

      $queris = $this->db->query("SELECT * FROM barang,supplier WHERE barang.id_supplier=supplier.id_supplier  ");

      $object = new PHPExcel();

      $object->setActiveSheetIndex(0);

      $table_columns = array("No." , "Nama supplier", "Nama barang" , "Kode", "Satuan" , "Harga beli" ,"Note");

      $column = 0;

      foreach($table_columns as $field){

        $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);

        $column++;

      }

      

      $excel_row = 2;
      $no = 1;
      foreach($queris->result() as $row){

        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row,$no++);
        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->nama);
        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->nama_barang);
        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->kode);
        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->satuan);
        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->harga_beli);
        
        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->note_barang);
        


        $excel_row++;

      }

      $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');

      header('Content-Type: application/vnd.ms-excel');

      header('Content-Disposition: attachment;filename="Barang-'.date('d_m_Y').'.xls"');

      $object_writer->save('php://output');
    }
  }