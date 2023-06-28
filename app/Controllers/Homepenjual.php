<?php 

namespace App\Controllers;

class Homepenjual extends BaseController
{
	public function indexpenjual()
	{
		echo view("penjualhome/home");
	}
	public function about()
	{
		echo view("penjualhome/about");
	}
	
    public function contact()
    {
        $data['name'] = "Belajar CodeIgniter";
        echo view("contact", $data);
    }
    public function faq()
	{
	$data['data_faqs'] = [
		[
			'question' => 'Apa itu Codeigniter?',
			'answer' => 'Codeigniter adalah framework untuk membuat web'
		],
		[
			'question' => 'Siapa yang membuat Codeiginter?',
			'answer' => 'CI awalnya dibuat oleh Ellislab'
		],
		[
			'question' => 'Codeigniter versi berapakah yang digunakan pada tutoril ini?',
			'answer' => 'Codeigniter versi 4.1.9'
		]
	];

	// load view dengan data
	echo view("penjualhome/faq", $data);
}
}