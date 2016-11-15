<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateListOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::statement(
            DB::raw( "INSERT INTO `list_options` (`list_id`, `option_id`, `title`, `seq`, `is_default`, `option_value`, `mapping`, `notes`, `codes`, `toggle_setting_1`, `toggle_setting_2`, `activity`, `subtype`) 
            VALUES 
            ('personal_relationship', 'ADOPT', 'Adopted Child', 10, 0, 0, '', 'ADOPT', '', 0, 0, 1, ''),
            ('personal_relationship', 'AUNT', 'Aunt', 20, 0, 0, '', 'AUNT', '', 0, 0, 1, ''),
            ('personal_relationship', 'CHILD', 'Child', 30, 0, 0, '', 'CHILD', '', 0, 0, 1, ''),
            ('personal_relationship', 'CHLDFOST', 'Foster Child', 80, 0, 0, '', 'CHLDFOST', '', 0, 0, 1, ''),
            ('personal_relationship', 'CHLDINLAW', 'Child in-law', 40, 0, 0, '', 'CHLDINLAW', '', 0, 0, 1, ''),
            ('personal_relationship', 'COUSN', 'Cousin', 50, 0, 0, '', 'COUSN', '', 0, 0, 1, ''),
            ('personal_relationship', 'DOMPART', 'Domestic Partner', 60, 0, 0, '', 'DOMPART', '', 0, 0, 1, ''),
            ('personal_relationship', 'FAMMEMB', 'Family Member', 70, 0, 0, '', 'FAMMEMB', '', 0, 0, 1, ''),
            ('personal_relationship', 'FRND', 'Unrelated Friend', 400, 0, 0, '', 'FRND', '', 0, 0, 1, ''),
            ('personal_relationship', 'GGRPRN', 'Great Grandparent', 120, 0, 0, '', 'GGRPRN', '', 0, 0, 1, ''),
            ('personal_relationship', 'GPARNT', 'Grandparent', 100, 0, 0, '', 'GPARNT', '', 0, 0, 1, ''),
            ('personal_relationship', 'GRNDCHILD', 'Grandchild', 90, 0, 0, '', 'GRNDCHILD', '', 0, 0, 1, ''),
            ('personal_relationship', 'GRPRN', 'Grandparent', 110, 0, 0, '', 'GRPRN', '', 0, 0, 1, ''),
            ('personal_relationship', 'HSIB', 'Half-Sibling', 130, 0, 0, '', 'HSIB', '', 0, 0, 1, ''),
            ('personal_relationship', 'MAUNT', 'MaternalAunt', 140, 0, 0, '', 'MAUNT', '', 0, 0, 1, ''),
            ('personal_relationship', 'MCOUSN', 'MaternalCousin', 150, 0, 0, '', 'MCOUSN', '', 0, 0, 1, ''),
            ('personal_relationship', 'MGGRPRN', 'MaternalGreatgrandparent', 170, 0, 0, '', 'MGGRPRN', '', 0, 0, 1, ''),
            ('personal_relationship', 'MGRPRN', 'MaternalGrandparent', 160, 0, 0, '', 'MGRPRN', '', 0, 0, 1, ''),
            ('personal_relationship', 'MUNCLE', 'MaternalUncle', 180, 0, 0, '', 'MUNCLE', '', 0, 0, 1, ''),
            ('personal_relationship', 'NBOR', 'Neighbor', 220, 0, 0, '', 'NBOR', '', 0, 0, 1, ''),
            ('personal_relationship', 'NCHILD', 'Natural Child', 190, 0, 0, '', 'NCHILD', '', 0, 0, 1, ''),
            ('personal_relationship', 'NIENEPH', 'Niece/Nephew', 230, 0, 0, '', 'NIENEPH', '', 0, 0, 1, ''),
            ('personal_relationship', 'NPRN', 'Natural Parent', 200, 0, 0, '', 'NPRN', '', 0, 0, 1, ''),
            ('personal_relationship', 'NSIB', 'Natural Sibling', 210, 0, 0, '', 'NSIB', '', 0, 0, 1, ''),
            ('personal_relationship', 'PAUNT', 'PaternalAunt', 260, 0, 0, '', 'PAUNT', '', 0, 0, 1, ''),
            ('personal_relationship', 'PCOUSN', 'PaternalCousin', 270, 0, 0, '', 'PCOUSN', '', 0, 0, 1, ''),
            ('personal_relationship', 'PGGRPRN', 'PaternalGreatgrandparent', 290, 0, 0, '', 'PGGRPRN', '', 0, 0, 1, ''),
            ('personal_relationship', 'PGRPRN', 'PaternalGrandparent', 280, 0, 0, '', 'PGRPRN', '', 0, 0, 1, ''),
            ('personal_relationship', 'PRN', 'Parent', 240, 0, 0, '', 'PRN', '', 0, 0, 1, ''),
            ('personal_relationship', 'PRNINLAW', 'parent in-law', 250, 0, 0, '', 'PRNINLAW', '', 0, 0, 1, '');"
            ));

        DB::table('value_sets')
            ->where( 'id', 3 )
            ->update([
            'key' => 'personal_relationship',
            'resource' => 'ListOptions'
        ]);

        DB::statement( DB::raw("INSERT INTO `list_options` (`list_id`, `option_id`, `title`, `seq`, `is_default`, `option_value`, `mapping`, `notes`, `codes`, `toggle_setting_1`, `toggle_setting_2`, `activity`, `subtype`) VALUES
            ('sex', 'Female', 'Female', 1, 0, 0, '', '', '', 0, 0, 1, ''),
            ('sex', 'Male', 'Male', 2, 0, 0, '', '', '', 0, 0, 1, '');"
        ));

        DB::table('value_sets')
            ->where( 'id', 4 )
            ->update([
                'key' => 'sex',
                'resource' => 'ListOptions'
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
