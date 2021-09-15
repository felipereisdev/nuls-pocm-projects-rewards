<?php

namespace App\Console\Commands;

use App\Project;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetPocmProjects extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pocm:projects';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::post('https://pocm.nuls.io/api/pocm/release/list', [
            'status' => 1,
            'lively' => 1
        ]);

        $projects = $response->json()['data'];

        if (!empty($projects)) {
            foreach ($projects as $project) {
                $projectObj = (object) $project;
                $projectInfoResponse = Http::get('https://pocm.nuls.io/api/pocm/release/' . $projectObj->id);
                $projectInfoObj = (object) $projectInfoResponse->json()['data'];

                Project::updateOrCreate([
                    'name' => $projectObj->name,
                    'project_id' => $projectObj->id
                ],
                [
                    'contract_address' => $projectObj->contractAddress,
                    'name' => $projectObj->name,
                    'url' => $projectObj->logoUrl,
                    'description' => $projectObj->projectCard,
                    'total_deposit' => $projectObj->totalDeposit,
                    'rewards' => $projectInfoObj->tokenPer100NULSPerDay,
                    'participants' => $projectInfoObj->depositCount,
                    'minimum_deposit' => $projectInfoObj->minimumDeposit,
                    'project_id' => $projectObj->id
                ]);
            }

            $this->info('Projects updated successfully');
        } else {
            $this->info('No project needs to be updated');
        }
    }
}
