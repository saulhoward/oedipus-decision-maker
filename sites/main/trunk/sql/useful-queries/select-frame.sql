# This select is intended to replace the multiple select statements in
# Oedipus_DramaFactory::get_frame_by_id(...)

SELECT
    f.id frame_id
    , f.name frame_name
    , c.name character_name
    , o.name option_name
    , si.position stated_intention_position
    , si.doubt stated_intention_doubt
    , p.position position_position
    , p.doubt position_doubt
FROM 
    oedipus_frames f
        LEFT JOIN oedipus_characters c ON f.id = c.frame_id
        LEFT JOIN oedipus_options o ON c.id = o.character_id
        LEFT JOIN oedipus_stated_intentions si ON si.id = o.stated_intention_id
        LEFT JOIN oedipus_positions p ON o.id = p.option_id AND c.id = p.character_id
WHERE
    f.id = 12;
