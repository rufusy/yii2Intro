<?php
    namespace app\models;

    use Yii;
    use yii\helpers\VarDumper;
    use yii\base\Model;

    class SignupForm extends Model
    {
        public $username;
        public $password;
        public $password_confirmation;

        public function rules()
        {
            return [
                [['username','password', 'password_confirmation'],'required'],
                [['username','password', 'password_confirmation'],'string','max'=>255],
                [['username'], 'string','min' => 4],
                [['password'], 'string','min' => 8],
                [['password_confirmation'], 'compare', 'compareAttribute' => 'password']
            ];
        }

        public function signup()
        {
            if ($this->validate())
            {
                $user = new User();
                $user->username = $this->username;
                $user->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
                $user->access_token = Yii::$app->getSecurity()->generateRandomString();
                $user->auth_key = Yii::$app->getSecurity()->generateRandomString();

                if($user->save()){
                    return true;
                }
                Yii::error('New user creation failed'. VarDumper::dumpAsString($user->errors));
                return false;
            }
            return false;
        }

    }