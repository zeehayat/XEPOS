<?php

namespace App\Services;

use App\Models\Company;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Mail\CompanyCreated;
use Illuminate\Support\Facades\Mail;

class CompanyService {
    private $company;
    public function __construct(Company $company) {
        $this->company = $company;

    }

    public static function storeLogo(UploadedFile $file) {

            $file->storeAs('public/uploads', $file->getClientOriginalName());
            $filePath = $file->getClientOriginalName();
            return $filePath;

    }
    public static function save(array $data) {

        $filePath=null;
        if( isset($data['logo'])){
            $filePath=SELF::storeLogo($data['logo']);
        }


        $company= Company::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'logo'=>$filePath,  /// If no image is provided then use null
            'website'=>$data['website']
        ]);
        Mail::to('zeenux@gmail.com’')->send(new CompanyCreated($company));

        return $company;
    }
    public static function show(int $id):?Company{
        return Company::find($id);
    }
    public static function showAll():Object{
        return Company::all();
    }
    public static function edit(array $data, int $id):?Company{
           $company=Company::find($id);
           $filePath = null;
           if (isset($data['logo'])) {

                $filePath = SELF::storeLogo($data['logo']);

            }

            $company->email = $data['email'];
            $company->name = $data['name'];
            $company->website = $data['website'];
            $company->logo=$filePath;
            $company->save();
            return $company;
        }

        public static function delete($id):bool{
            $company=Company::find($id);
            return $company->delete();

        }
}
