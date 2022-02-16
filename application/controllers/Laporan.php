<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('laporan_m');
	}

	public function index()
	{
		$data['penjualans'] = $this->laporan_m->getPenjualans();
		$this->template->load('template', 'laporan', $data);
	}

	public function detail($idPenjualan) {
		$data['penjualan'] = $this->laporan_m->getPenjualan($idPenjualan);
		$data['details'] = $this->laporan_m->getPenjualanDetail($idPenjualan);
		$this->template->load('template', 'laporan_detail', $data);
	}

	public function exportExcel()
	{
		$details = $this->laporan_m->getPenjualanDetais();

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->getColumnDimension('A')->setAutoSize(true);
		$sheet->getColumnDimension('B')->setAutoSize(true);
		$sheet->getColumnDimension('C')->setAutoSize(true);
		$sheet->getColumnDimension('D')->setAutoSize(true);
		$sheet->getColumnDimension('E')->setAutoSize(true);
		$sheet->getStyle('A:E')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A1:E1')->getFont()->setBold(true);

		$sheet->setCellValue('A1', 'Kode barang');
		$sheet->setCellValue('B1', 'Nama barang');
		$sheet->setCellValue('C1', 'Harga');
		$sheet->setCellValue('D1', 'Quantity');
		$sheet->setCellValue('E1', 'Jumlah');

		$i = 2;
		foreach($details as $detail) {
			$sheet->setCellValue('A'.$i, $detail['id_barang']);
			$sheet->setCellValue('B'.$i, $detail['nama_barang']);
			$sheet->setCellValue('C'.$i, $detail['harga']);
			$sheet->setCellValue('D'.$i, $detail['quantity']);
			$sheet->setCellValue('E'.$i, $detail['jumlah']);

			$i++;
		}

		// redirect output to client browser
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Laporan_Penjualan.xlsx"');
		header('Cache-Control: max-age=0');
		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
	}
}
