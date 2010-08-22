#USE odm_dev_rob;

SELECT 
    *
FROM 
    oedipus_dramas AS d
        JOIN oedipus_acts AS a ON d.id = a.drama_id
        JOIN oedipus_scenes AS s ON a.id = s.act_id
        JOIN oedipus_frames AS f ON s.id = f.scene_id
        JOIN oedipus_characters AS c ON f.id = c.frame_id
        JOIN oedipus_positions AS p ON c.id = p.character_id
        JOIN oedipus_options AS o ON c.id = o.character_id
        JOIN oedipus_stated_intentions AS si ON o.stated_intention_id = si.id
WHERE
    d.id = 6;
    