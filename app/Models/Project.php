<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Corcel\Model\Post as Corcel;

class Project extends Corcel
{
    protected $postType = 'projets';

    protected $appends = ['files'];

    public function files()
    {
        $files = $this->meta->projectFiles;
        $unSerializedFiles = unserialize($files);

        $i = 0;
        $blocks = [];
        if($unSerializedFiles) {
            foreach ($unSerializedFiles as $file) {
                if($file === 'singleFile') {
                    $blocks[] = [
                        'type' => $file,
                        'data' => [
                            'name' => $this->{"projectFiles_" . $i . "_name"},
                            'link' => $this->{"projectFiles_" . $i . "_link"},
                            'type' => $this->{"projectFiles_" . $i . "_type"},
                            'content' => $this->{"projectFiles_" . $i . "_content"}
                        ]
                    ];
                } else {
                    $repeaterCounter = $this->{"projectFiles_" . $i . "_files"};
                    $items = [];
                    for ($j = 0; $j < $repeaterCounter; $j++) {
                        $items[] = [
                            'name' => $this->{"projectFiles_" . $i . "_files_" . $j . "_name"},
                            'link' =>$this->{"projectFiles_" . $i . "_files_" . $j . "_link"},
                            'type' => $this->{"projectFiles_" . $i . "_files_" . $j . "_type"},
                        ];
                    }

                    $blocks[] = [
                        'type' => $file,
                        'content' =>  $this->{"projectFiles_" . $i . "_content"},
                        'data' => $items,
                    ];
                }
                $i++;
            }
        }

        return $blocks;
    }

}
