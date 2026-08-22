<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Position::create(
            [
                "name"=>"Tight-head Prop",
                "position_group"=>"Forward",
                "format"=>"15s"
            ]
        );

        Position::create(
            [
                "name"=>"Loose-head Prop",
                "position_group"=>"Forward",
                "format"=>"15s"
            ]
        );

        Position::create(
            [
                "name"=>"Hooker",
                "position_group"=>"Forward",
                "format"=>"15s"
            ]
        );

        Position::create(
            [
                "name"=>"Lock",
                "position_group"=>"Forward",
                "format"=>"15s"
            ]
        );

        Position::create(
            [
                "name"=>"Blindside Flanker",
                "position_group"=>"Forward",
                "format"=>"15s"
            ]
        );

        Position::create(
            [
                "name"=>"Open side Flanker",
                "position_group"=>"Forward",
                "format"=>"15s"
            ]
        );

        Position::create(
            [
                "name"=>"Number 8",
                "position_group"=>"Forward",
                "format"=>"15s"
            ]
        );

        Position::create(
            [
                "name"=>"Scrumhalf",
                "position_group"=>"Backs",
                "format"=>"15s"
            ]
        );

        Position::create(
            [
                "name"=>"Fly-half",
                "position_group"=>"Backs",
                "format"=>"15s"
            ]
        );

        Position::create(
            [
                "name"=>"Left Wing",
                "position_group"=>"Backs",
                "format"=>"15s"
            ]
        );

        Position::create(
            [
                "name"=>"Inside Centre",
                "position_group"=>"Backs",
                "format"=>"15s"
            ]
        );

        Position::create(
            [
                "name"=>"Outside Centre",
                "position_group"=>"Backs",
                "format"=>"15s"
            ]
        );

        Position::create(
            [
                "name"=>"Right Wing",
                "position_group"=>"Backs",
                "format"=>"15s"
            ]
        );

        Position::create(
            [
                "name"=>"Full-back",
                "position_group"=>"Backs",
                "format"=>"15s"
            ]
        );
    }
}
