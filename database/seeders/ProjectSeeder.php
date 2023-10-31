<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'status'                => '1',
            'community'             => 'Dubai West Life',
            'category_id'           => '1',
            'emirate_id'            => '1',
            'property_release_id'   => '1',
            'slug_link'             => 'the-horizon',
            'name'                  => 'The Horizon',
            'heading1'              => 'What you see today is what you see tomorrow',
            'heading2'              => 'World Class Amenities',
            'heading3'              => 'Ultra Premium Features',
            'description1'          => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum rhoncus augue ut ligula accumsan dictum. Phasellus euismod in lectus nec cursus. Curabitur in sem et elit dignissim condimentum eget ac dui. Nulla non nisl mollis ipsum laoreet ultrices ac in sapien.',
            'description2'          => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum rhoncus augue ut ligula accumsan dictum. Phasellus euismod in lectus nec cursus. Curabitur in sem et elit dignissim condimentum eget ac dui. Nulla non nisl mollis ipsum laoreet ultrices ac in sapien.',
            'description3'          => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum rhoncus augue ut ligula accumsan dictum. Phasellus euismod in lectus nec cursus. Curabitur in sem et elit dignissim condimentum eget ac dui. Nulla non nisl mollis ipsum laoreet ultrices ac in sapien.',
            'description4'          => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum rhoncus augue ut ligula accumsan dictum. Phasellus euismod in lectus nec cursus. Curabitur in sem et elit dignissim condimentum eget ac dui. Nulla non nisl mollis ipsum laoreet ultrices ac in sapien.',
            'ownership'             => 'Leasehold',
            'handover'              => '2027 Q4',
            'starting_price'        => '1500000',
            'meta_title'            => 'The Horizon - A World Class Property',
            'meta_description'      => 'What you see today is what you see tomorrow',
            'meta_keywords'         => 'apartments, world-class, dubai-real-estate, apartments-for-sale',
            'latitude'              => '24.684378',
            'longitude'             => '55.845194',
            'no_of_units'           => '221',
            'bedrooms'              => 'Studio 1, 2, 3 & 4',
            'bathrooms'             => '1, 2, 3, 4, & 5',
            'floors'                => '30',
            'unit_size_range'       => '1500 - 5000',
            'outdoor_area'          => '25000 - 30000',
            'terrace_area'          => '17000',
            'escrow'                => '55423425543253425423443',
        ]);
    }
}
