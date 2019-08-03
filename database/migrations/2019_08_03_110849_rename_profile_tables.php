<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameProfileTables extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::rename("cvs", "profile_cvs");
		Schema::rename("addresses", "profile_addresses");
		Schema::rename("projects", "profile_projects");
		Schema::rename("details", "profile_details");
		Schema::rename("educations", "profile_educations");
		Schema::rename("emails", "profile_emails");
		Schema::rename("experiences", "profile_experiences");
		Schema::rename("galleries", "profile_galleries");
		Schema::rename("phones", "profile_phones");
		Schema::rename("skill_tags", "profile_skill_tags");
		Schema::rename("skills", "profile_skills");
		Schema::rename("social_medias", "profile_social_medias");
		
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::rename("profile_cvs", "cvs");
		Schema::rename("profile_addresses", "addresses");
		Schema::rename("profile_projects", "projects");
		Schema::rename("profile_details", "details");
		Schema::rename("profile_educations", "educations");
		Schema::rename("profile_emails", "emails");
		Schema::rename("profile_experiences", "experiences");
		Schema::rename("profile_galleries", "galleries");
		Schema::rename("profile_phones", "phones");
		Schema::rename("profile_skill_tags", "skill_tags");
		Schema::rename("profile_skills", "skills");
		Schema::rename("profile_social_medias", "social_medias");
		
	}
	
}
