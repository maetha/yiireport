<?php
namespace app\modules\hosxpreport\controllers;
use yii\web\Controller;
use yii\data\ArrayDataProvider;
use Yii;
class ReportsController extends Controller{
    
    
    public function actionOpddiag($pdx=null,$date1=null,$date2=null,$icdname=null,$a=null){
        
        if($date1 == null){
            $date1 = date('Y-m-d');
            $date2 = date('Y-m-d');
        }
        $connection = Yii::$app->db2;
        $data = $connection->createCommand("select a.pdx
            ,i.name as icdname 
            ,count(a.pdx) as a
            from vn_stat a 
            left outer join icd101 i on i.code=a.main_pdx 
            where a.vstdate between '$date1' and '$date2' 
            and a.pdx<>'' and a.pdx is not null  
            and a.pdx not like('%Z%')
            group by a.pdx,i.name 
            order by a desc 
            limit 10")->queryAll();
        
       for ($i = 0; $i < sizeof($data); $i++) {
            $pdx[] = $data[$i]['pdx'];        
            $icdname[] = $data[$i]['icdname']; 
            $a[] = $data[$i]['a']*1; 
        }
        
        $dataProvider = new ArrayDataProvider([
                'allModels'=>$data, 
            ]);
        
        return $this->render('opddiag', [
            'dataProvider' => $dataProvider,
            'pdx'=>$pdx,
            'icdname'=>$icdname,
            'a'=>$a,
            'date1'=>$date1,
            'date2'=>$date2
        ]);
    }
    public function actionIndivopddiag($pdx=null,$date1=null,$date2=null){
        
        $sql = "select a.hn,p.pname,p.fname,p.lname,a.pdx,a.vstdate
        from vn_stat a 
        left outer join patient p on p.hn=a.hn
        left outer join icd101 i on i.code=a.main_pdx 
        where a.vstdate between '$date1' and '$date2' 
        and a.pdx<>'' and a.pdx is not null 
        and a.pdx='$pdx'
        order by a.vn";
        
         try {
            $rawData = \Yii::$app->db2->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        
        return $this->render('indivopddiag', [
            'rawData' => $rawData,
            'sql'=>$sql,
            'pdx'=>$pdx
            
        ]);
    }
}