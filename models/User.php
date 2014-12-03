<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\log\Logger;
use yii\web\IdentityInterface;
use Yii;

/**
 * This is the model class for table "User".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property string $auth_key
 * @property integer $confirmed_at
 * @property string $unconfirmed_email
 * @property integer $blocked_at
 * @property string $role
 * @property integer $registration_ip
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $flags
 *
 * @property Affiliation[] $affiliations
 * @property Author[] $authors
 * @property AuthorAffiliation[] $authorAffiliations
 * @property Category[] $categories
 * @property Construct[] $constructs
 * @property ConstructCategory[] $constructCategories
 * @property CorrelationMatrix[] $correlationMatrices
 * @property Figure[] $figures
 * @property Group[] $groups
 * @property GroupIntervention[] $groupInterventions
 * @property Hypothesis[] $hypotheses
 * @property Intervention[] $interventions
 * @property Log[] $logs
 * @property Measurement[] $measurements
 * @property Profile $profile
 * @property Project[] $projects
 * @property Relationship[] $relationships
 * @property RelationshipMetric[] $relationshipMetrics
 * @property RelationshipMetricType[] $relationshipMetricTypes
 * @property SocialAccount[] $socialAccounts
 * @property Source[] $sources
 * @property SourceAuthor[] $sourceAuthors
 * @property Statistic[] $statistics
 * @property StatisticType[] $statisticTypes
 * @property Study[] $studies
 * @property Table[] $tables
 * @property Time[] $times
 * @property TimeIntervention[] $timeInterventions
 * @property TimeRelationship[] $timeRelationships
 * @property Token[] $tokens
 * @property UserDefinedField[] $userDefinedFields
 * @property UserDefinedFieldValue[] $userDefinedFieldValues
 * @property UserProject[] $userProjects
 * @property UserSource[] $userSources
 */
class User extends ActiveRecord implements IdentityInterface
{
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('orion2Db');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password_hash', 'auth_key', 'created_at', 'updated_at'], 'required'],
            [['confirmed_at', 'blocked_at', 'registration_ip', 'created_at', 'updated_at', 'flags'], 'integer'],
            [['username'], 'string', 'max' => 25],
            [['email', 'unconfirmed_email', 'role'], 'string', 'max' => 255],
            [['password_hash'], 'string', 'max' => 60],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'email' => Yii::t('app', 'Email'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'confirmed_at' => Yii::t('app', 'Confirmed At'),
            'unconfirmed_email' => Yii::t('app', 'Unconfirmed Email'),
            'blocked_at' => Yii::t('app', 'Blocked At'),
            'role' => Yii::t('app', 'Role'),
            'registration_ip' => Yii::t('app', 'Registration Ip'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'flags' => Yii::t('app', 'Flags'),
        ];
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAffiliations()
    {
        return $this->hasMany(Affiliation::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasMany(Author::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthorAffiliations()
    {
        return $this->hasMany(AuthorAffiliation::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConstructs()
    {
        return $this->hasMany(Construct::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConstructCategories()
    {
        return $this->hasMany(ConstructCategory::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCorrelationMatrices()
    {
        return $this->hasMany(CorrelationMatrix::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFigures()
    {
        return $this->hasMany(Figure::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupInterventions()
    {
        return $this->hasMany(GroupIntervention::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHypotheses()
    {
        return $this->hasMany(Hypothesis::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterventions()
    {
        return $this->hasMany(Intervention::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogs()
    {
        return $this->hasMany(Log::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeasurements()
    {
        return $this->hasMany(Measurement::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelationships()
    {
        return $this->hasMany(Relationship::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelationshipMetrics()
    {
        return $this->hasMany(RelationshipMetric::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelationshipMetricTypes()
    {
        return $this->hasMany(RelationshipMetricType::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialAccounts()
    {
        return $this->hasMany(SocialAccount::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSources()
    {
        return $this->hasMany(Source::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSourceAuthors()
    {
        return $this->hasMany(SourceAuthor::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatistics()
    {
        return $this->hasMany(Statistic::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatisticTypes()
    {
        return $this->hasMany(StatisticType::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudies()
    {
        return $this->hasMany(Study::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTables()
    {
        return $this->hasMany(Table::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimes()
    {
        return $this->hasMany(Time::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimeInterventions()
    {
        return $this->hasMany(TimeIntervention::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimeRelationships()
    {
        return $this->hasMany(TimeRelationship::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTokens()
    {
        return $this->hasMany(Token::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserDefinedFields()
    {
        return $this->hasMany(UserDefinedField::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserDefinedFieldValues()
    {
        return $this->hasMany(UserDefinedFieldValue::className(), ['last_modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProjects()
    {
        return $this->hasMany(UserProject::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserSources()
    {
        return $this->hasMany(UserSource::className(), ['user_id' => 'id']);
    }
}
