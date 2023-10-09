<?php

namespace App\Exports;

use App\Models\Payment;
use App\Models\Resident;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Conditional;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class UsersExport implements FromCollection,ShouldAutoSize,WithHeadings,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $resident = Resident::leftJoin('users','residents.user_id','=','users.id')
        ->join('houses','residents.house_id','=','houses.id')
        ->join('usertype','users.usertype_id','=','usertype.id')
        ->select('residents.user_id','users.name','usertype.role','isOwner','houses.full_address','residents.house_id','houses.full_address','houses.house_type','datofoccupancy','users.mobile1','users.mobile2','users.email')
        ->get()
        ->map(function($item){
            $item->isOwner = $item->isOwner ? 'Owner' : 'Tenant';
            $item->email = $item->email ? $item->email : 'Not Provided';
            $item->mobile2 = $item->mobile2 ? $item->mobile2 : 'Not Provided';
            $item->mobile1 = $item->mobile1 ? $item->mobile1 : 'Not Provided';
            $payments = Payment::where('house_id',$item->house_id)->get();
            foreach(config('global.months') as $key => $value){
                if($key == "All"){
                    continue;
                }else{
                    $item->$key = "Not Paid";
                    foreach($payments as $payment){
                        if($key == $payment->billingmonth){
                            // dump($payment->billingmonth);
                            $item->$key = "Paid";
                        }
                    }
                }
                        // die();   
                    }
                    unset($item->house_id);
            return $item;
        });
        // dd($resident->first());
        return $resident;
    }
# i want to get the dates dynamically from the global.php file and add them into the heading array insted of precoding them
    public function headings(): array
    {
        $headings = array('User ID','Name','User Type','Owner/Tenant','House Address','House Type','Date of Occupancy','Mobile 1','Mobile 2','Email'); 
        foreach(config('global.months') as $key => $value){
            if($key == "All"){
                continue;
            }else{
                array_push($headings,$value);
            }
        }
        
        return $headings;
    }
    public function styles($sheet)
    {   

        // dd($sheet->getHighestColumn()); 


        $conditional = new Conditional();
        $conditional->setConditionType(Conditional::CONDITION_CELLIS);
        $conditional->setOperatorType(Conditional::OPERATOR_EQUAL);
        $conditional->addCondition('"Not Paid"');
        $conditional->getStyle()->getFont()->getColor()->setARGB(Color::COLOR_DARKGREEN);
        $conditional->getStyle()->getFill()->setFillType(Fill::FILL_SOLID);
        $conditional->getStyle()->getFill()->getEndColor()->setARGB(Color::COLOR_RED);
        $conditional->getStyle()->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
        $conditionalStyles = $sheet->getStyle('K2:'.$sheet->getHighestColumn().''.$sheet->getHighestRow())->getConditionalStyles();
        $conditionalStyles[] = $conditional;
        $sheet->getStyle('K2:'.$sheet->getHighestColumn().''.$sheet->getHighestRow())->setConditionalStyles($conditionalStyles);
        
        $conditional = new Conditional();
        $conditional->setConditionType(Conditional::CONDITION_CELLIS);
        $conditional->setOperatorType(Conditional::OPERATOR_EQUAL);
        $conditional->addCondition('"Paid"');
        $conditional->getStyle()->getFont()->getColor()->setARGB(Color::COLOR_DARKGREEN);
        $conditional->getStyle()->getFill()->setFillType(Fill::FILL_SOLID);
        $conditional->getStyle()->getFill()->getEndColor()->setARGB(Color::COLOR_GREEN);
        $conditionalStyles = $sheet->getStyle('K2:'.$sheet->getHighestColumn().''.$sheet->getHighestRow())->getConditionalStyles();
        $conditionalStyles[] = $conditional;
        $sheet->getStyle('K2:'.$sheet->getHighestColumn().''.$sheet->getHighestRow())->setConditionalStyles($conditionalStyles);

        $conditional = new Conditional();
        $conditional->setConditionType(Conditional::CONDITION_CELLIS);
        $conditional->setOperatorType(Conditional::OPERATOR_EQUAL);
        $conditional->addCondition('"Not Provided"');
        $conditional->getStyle()->getFont()->getColor()->setARGB(Color::COLOR_DARKGREEN);
        $conditional->getStyle()->getFill()->setFillType(Fill::FILL_SOLID);
        $conditional->getStyle()->getFill()->getEndColor()->setARGB(Color::COLOR_YELLOW);
        $conditionalStyles = $sheet->getStyle('H2:J'.$sheet->getHighestRow())->getConditionalStyles();
        $conditionalStyles[] = $conditional;
        $sheet->getStyle('H2:J'.$sheet->getHighestRow())->setConditionalStyles($conditionalStyles);

        $conditional = new Conditional();
        $conditional->setConditionType(Conditional::CONDITION_CELLIS);
        $conditional->setOperatorType(Conditional::OPERATOR_NOTEQUAL);
        $conditional->addCondition('"Not Provided"');
        $conditional->getStyle()->getFont()->getColor()->setARGB(Color::COLOR_DARKGREEN);
        $conditional->getStyle()->getFill()->setFillType(Fill::FILL_SOLID);
        $conditional->getStyle()->getFill()->getEndColor()->setARGB(Color::COLOR_GREEN);
        $conditionalStyles = $sheet->getStyle('H2:J'.$sheet->getHighestRow())->getConditionalStyles();
        $conditionalStyles[] = $conditional;
        $sheet->getStyle('H2:J'.$sheet->getHighestRow())->setConditionalStyles($conditionalStyles);
        return [
            1 => ['font' => ['bold' => true],
            'borders' => ['allBorders' => ['borderStyle' => 'thin', 'color' => ['argb' => '000000ff']]],
            
        ],
        
        ];
    }

}
