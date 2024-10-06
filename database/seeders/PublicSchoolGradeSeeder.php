<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PublicSchoolGradingSystem;

class PublicSchoolGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
        //
        //Primary level
        //Grade A
        $primaryGradeA = new PublicSchoolGradingSystem;
        $primaryGradeA->grade = 'A';
        $primaryGradeA->min ='81';
        $primaryGradeA->max = '100';
        $primaryGradeA->level = 'primary';
        $primaryGradeA->save();
        //Grade B
        $primaryGradeB = new PublicSchoolGradingSystem;
        $primaryGradeB->grade = 'B';
        $primaryGradeB->min ='61';
        $primaryGradeB->max = '80';
        $primaryGradeB->level = 'primary';
        $primaryGradeB->save();
        //Grade C
        $primaryGradeC = new PublicSchoolGradingSystem;
        $primaryGradeC->grade = 'C';
        $primaryGradeC->min ='41';
        $primaryGradeC->max = '60';
        $primaryGradeC->level = 'primary';
        $primaryGradeC->save();
        // Grade D
        $primaryGradeD = new PublicSchoolGradingSystem;
        $primaryGradeD->grade = 'D';
        $primaryGradeD->min ='31';
        $primaryGradeD->max = '40';
        $primaryGradeD->level = 'primary';
        $primaryGradeD->save();
        //Grade F
        $primaryGradeF = new PublicSchoolGradingSystem;
        $primaryGradeF->grade = 'F';
        $primaryGradeF->min ='0';
        $primaryGradeF->max = '30';
        $primaryGradeF->level = 'primary';
        $primaryGradeF->save();

        //Ordinary level 
        //Grade A
        $odinarySecondaryGradeA = new PublicSchoolGradingSystem;
        $odinarySecondaryGradeA->grade = 'A';
        $odinarySecondaryGradeA->min = '75';
        $odinarySecondaryGradeA->max = '100';
        $odinarySecondaryGradeA->level = 'O level';
        $odinarySecondaryGradeA->save();

        //Grade B
        $odinarySecondaryGradeB = new PublicSchoolGradingSystem;
        $odinarySecondaryGradeB->grade = 'B';
        $odinarySecondaryGradeB->min = '65';
        $odinarySecondaryGradeB->max = '74';
        $odinarySecondaryGradeB->level = 'O level';
        $odinarySecondaryGradeB->save();

        //Grade C
        $odinarySecondaryGradeC = new PublicSchoolGradingSystem;
        $odinarySecondaryGradeC->grade = 'A';
        $odinarySecondaryGradeC->min = '45';
        $odinarySecondaryGradeC->max = '64';
        $odinarySecondaryGradeC->level = 'O level';
        $odinarySecondaryGradeC->save();

        //Grade D
        $odinarySecondaryGradeD = new PublicSchoolGradingSystem;
        $odinarySecondaryGradeD->grade = 'A';
        $odinarySecondaryGradeD->min = '30';
        $odinarySecondaryGradeD->max = '44';
        $odinarySecondaryGradeD->level = 'O level';
        $odinarySecondaryGradeD->save();

        //Grade F
        $odinarySecondaryGradeF = new PublicSchoolGradingSystem;
        $odinarySecondaryGradeF->grade = 'A';
        $odinarySecondaryGradeF->min = '0';
        $odinarySecondaryGradeF->max = '29';
        $odinarySecondaryGradeF->level = 'O level';
        $odinarySecondaryGradeF->save();


        //Advance Level
        //Grade A
        $advanceSecondaryGradeA = new PublicSchoolGradingSystem;
        $advanceSecondaryGradeA->grade = 'A';
        $advanceSecondaryGradeA->min = '80';
        $advanceSecondaryGradeA->max = '100';
        $advanceSecondaryGradeA->level = 'A level';
        $advanceSecondaryGradeA->save();
        
        //Grade B
        $advanceSecondaryGradeB = new PublicSchoolGradingSystem;
        $advanceSecondaryGradeB->grade = 'B';
        $advanceSecondaryGradeB->min = '70';
        $advanceSecondaryGradeB->max = '79';
        $advanceSecondaryGradeB->level = 'A level';
        $advanceSecondaryGradeB->save();

        //Grade C
        $advanceSecondaryGradeC = new PublicSchoolGradingSystem;
        $advanceSecondaryGradeC->grade = 'C';
        $advanceSecondaryGradeC->min = '60';
        $advanceSecondaryGradeC->max = '69';
        $advanceSecondaryGradeC->level = 'A level';
        $advanceSecondaryGradeC->save();

        //Grade D
        $advanceSecondaryGradeD = new PublicSchoolGradingSystem;
        $advanceSecondaryGradeD->grade = 'D';
        $advanceSecondaryGradeD->min = '50';
        $advanceSecondaryGradeD->max = '59';
        $advanceSecondaryGradeD->level = 'A level';
        $advanceSecondaryGradeD->save();

        //Grade E
        $advanceSecondaryGradeE = new PublicSchoolGradingSystem;
        $advanceSecondaryGradeE->grade = 'E';
        $advanceSecondaryGradeE->min = '40';
        $advanceSecondaryGradeE->max = '49';
        $advanceSecondaryGradeE->level = 'A level';
        $advanceSecondaryGradeE->save();

        //Grade S
        $advanceSecondaryGradeS = new PublicSchoolGradingSystem;
        $advanceSecondaryGradeS->grade = 'S';
        $advanceSecondaryGradeS->min = '35';
        $advanceSecondaryGradeS->max = '39';
        $advanceSecondaryGradeS->level = 'A level';
        $advanceSecondaryGradeS->save();

        //Grade F
        $advanceSecondaryGradeF = new PublicSchoolGradingSystem;
        $advanceSecondaryGradeF->grade = 'A';
        $advanceSecondaryGradeF->min = '0';
        $advanceSecondaryGradeF->max = '34';
        $advanceSecondaryGradeF->level = 'A level';
        $advanceSecondaryGradeF->save();


    }
}
