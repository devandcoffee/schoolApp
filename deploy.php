<?php
namespace Deployer;

require 'vendor/deployer/recipes/local.php';
require 'recipe/laravel.php';

// Settings

// ssh settings
set('ssh_type', 'native');
set('ssh_multiplexing', true);

// local paths
set('local_release_path', '/tmp/schoolApp');

// deploy paths
set('deploy_path', '/home/school/deploy');

set('local_releases_list', function () {
    $list = null;
    return $list;
});

// Repository settings
set('repository', 'git@github.com:devandcoffee/schoolApp.git');
set('branch', 'master');

// Hosts
host('104.131.15.241')
    ->stage('testing')
    ->user('school')
    ->forwardAgent(true)
    ->set('deploy_path', '{{deploy_path}}');

// Tasks
desc('Upload local folder on the remote server');
task('upload_code', function() {
    upload(get('local_release_path'), get('release_path'));
});

desc('Remove relase temporal folder');
task('remove_local_release', function() {
    runLocally("rm -rf {{local_release_path}}");
});

desc('Clean release, remove unwanted files');
task('cleanup_local_release', function () {
    runLocally("rm -rf {{local_release_path}}/node_modules");
    runLocally("rm -rf {{local_release_path}}/.gitlab-ci.yml");
});
after('cleanup_local_release', 'upload_code');

desc('Load docker containers');
task('docker_compose_up', function() {
    run("cd {{deploy_path}} && docker-compose up -d");
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
after('deploy:failed', 'remove_local_release');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');
after('artisan:migrate', 'artisan:db:seed');

// Main task
desc('Deploy your project');
task('deploy', [
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'local:update_code',
    'local:vendors_npm',
    'local:vendors',
    'cleanup_local_release',
    'deploy:shared',
    'deploy:writable',
    'artisan:cache:clear',
    'artisan:optimize',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'remove_local_release',
]);
