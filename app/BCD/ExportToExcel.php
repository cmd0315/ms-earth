<?php namespace BCD;

use Excel;

class ExportToExcel {

	/**
	* Database rows to be passed as an array to the excel sheet
	*
	* @var array $dataArray
	*/
	protected $dataArray;

	/**
	* Excel sheet file name
	*
	* @var String $fileName
	*/
	protected $fileName;


	/**
	* Constructor
	*
	* @param array $dataArray
	* @param String $fileName
	*/
	public function __construct($dataArray, $fileName) {
		$this->dataArray = $dataArray;
		$this->fileName = $fileName . '-(c)BCD Pinpoint';
	}


	/**
	* Create and export Excel worksheet that contains the results of the queried list
	*
	* @return Excel
	*/
	public function export() {

		Excel::create($this->fileName, function($excel) {

			// Set the title
		    $excel->setTitle('List of Participants for Ms. Earth 2015 Fun Run');

		    // Chain the setters
		    $excel->setCreator('BCD Pinpoint')
		          ->setCompany('BCD Pinpoint');

			$excel->sheet('Records', function($sheet) {

				$sheet->fromArray($this->dataArray);
				$sheet->setAutoFilter(); // Auto filter for entire sheet
				$sheet->freezeFirstRow();
				$sheet->row(1, function($row) {// Set black background

				    // call cell manipulation methods
				    $row->setBackground('#026aa8');
				    $row->setFontWeight('bold');
				    $row->setFontColor('#ffffff');

				});

			});
		})->export('xls');
	}

	

}

