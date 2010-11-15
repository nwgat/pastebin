<?php
/*************************************************************************************
 * lua.php
 * -------
 * Author: Roberto Rossi (rsoftware@altervista.org)
 * Copyright: (c) 2004 Roberto Rossi (http://rsoftware.altervista.org), Nigel McNie (http://qbnz.com/highlighter)
 * Release Version: 1.0.8.1
 * Date Started: 2004/07/10
 *
 * LUA language file for GeSHi.
 *
 * CHANGES
 * -------
 * 2005/08/26 (1.0.2)
 *  -  Added support for objects and methods
 *  -  Removed unusable keywords
 * 2004/11/27 (1.0.1)
 *  -  Added support for multiple object splitters
 * 2004/10/27 (1.0.0)
 *  -  First Release
 *
 * TODO (updated 2004/11/27)
 * -------------------------
 *
 *************************************************************************************
 *
 *     This file is part of GeSHi.
 *
 *   GeSHi is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *   GeSHi is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with GeSHi; if not, write to the Free Software
 *   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 ************************************************************************************/

$language_data = array (
    'LANG_NAME' => 'Garry\'s Mod Lua',
    'COMMENT_SINGLE' => array(1 => "--", 2 => '//'),
    'COMMENT_MULTI' => array('--[[' => ']]', "/*" => "*/" ),
    'CASE_KEYWORDS' => GESHI_CAPS_NO_CHANGE,
    'QUOTEMARKS' => array("'", '"', '[[', ']]'),
    'ESCAPE_CHAR' => '\\',
    'KEYWORDS' => array(
        1 => array(
            'and', 'break','do','else','elseif','end','false','for','function','if',
            'in','local','nil','not', "&amp;&amp;", "!=", "==", 'or', 'repeat','return','then','true','until','while' ),
                
                2 => array (
                        'string.byte', 'string.char', 'string.dump', 'string.Explode', 'string.find', 'string.format', 'string.FormattedTime', 'string.GetExtensionFromFilename', 'string.GetFileFromFilename', 'string.GetPathFromFilename', 'string.gfind', 'string.gmatch', 'string.gsub', 'string.Implode', 'string.Left', 'string.len', 'string.lower', 'string.match', 'string.rep', 'string.Replace', 'string.reverse', 'string.Right', 'string.sub', 'string.ToMinutesSeconds', 'string.ToMinutesSecondsMilliseconds', 'string.ToTable', 'string.Trim', 'string.TrimLeft', 'string.TrimRight', 'string.upper' ),
                
                3 => array (
            '_VERSION','assert','collectgarbage','dofile','error','gcinfo','loadfile','loadstring',
            'print','tonumber','tostring','type','unpack',
            '_ALERT','_ERRORMESSAGE','_INPUT','_PROMPT','_OUTPUT',
            '_STDERR','_STDIN','_STDOUT','call','dostring','foreach','foreachi','getn','globals','newtype',
            'rawget','rawset','require','sort','tinsert','tremove',
            'abs','acos','asin','atan','atan2','ceil','cos','deg','exp',
            'floor','format','frexp','gsub','ldexp','log','log10','max','min','mod','rad','random','randomseed',
            'sin','sqrt','strbyte','strchar','strfind','strlen','strlower','strrep','strsub','strupper','tan',
            'openfile','closefile','readfrom','writeto','appendto',
            'remove','rename','flush','seek','tmpfile','tmpname','read','write',
            'clock','date','difftime','execute','exit','getenv','setlocale','time',
            '_G','getfenv','getmetatable','ipairs','loadlib','next','pairs','pcall',
            'rawegal','setfenv','setmetatable','xpcall',
            'string.byte','string.char','string.dump','string.find','string.len',
            'string.lower','string.rep','string.sub','string.upper','string.format','string.gfind','string.gsub',
            'table.concat','table.foreach','table.foreachi','table.getn','table.sort','table.insert','table.remove','table.setn',
            'math.abs','math.acos','math.asin','math.atan','math.atan2','math.ceil','math.cos','math.deg','math.exp',
            'math.floor','math.frexp','math.ldexp','math.log','math.log10','math.max','math.min','math.mod',
            'math.pi','math.rad','math.random','math.randomseed','math.sin','math.sqrt','math.tan',
            'coroutine.create','coroutine.resume','coroutine.status',
            'coroutine.wrap','coroutine.yield',
            'io.close','io.flush','io.input','io.lines','io.open','io.output','io.read','io.tmpfile','io.type','io.write',
            'io.stdin','io.stdout','io.stderr',
            'os.clock','os.date','os.difftime','os.execute','os.exit','os.getenv','os.remove','os.rename',
            'os.setlocale','os.time','os.tmpname',
            'table','math','coroutine','io','os','debug'
            ),
                        
                // 4= global, 5 = entity, 6 = player, 7 = lib funcs
                4 => array ( 'AccessorFunc', 'AccessorFuncNW', 'Add_NPC_Class', 'AddConsoleCommand', 'AddCSLuaFile', 'Angle', 'assert', 'BroadcastLua', 'BuildNetworkedVarsTable', 'ClientCallGamemode', 'collectgarbage', 'Color', 'ColorToHSV', 'ConVarExists', 'CreateClientConVar', 'CreateConVar', 'CreateSound', 'CurTime', 'DamageInfo', 'DeriveGamemode', 'EffectData', 'engineCommandComplete', 'engineConsoleCommand', 'Entity', 'Error', 'error', 'ErrorNoHalt', 'FindMetaTable', 'Format', 'FrameTime', 'gcinfo', 'GetAddonList', 'GetConVar', 'GetConVarNumber', 'GetConVarString', 'GetDownloadables', 'getfenv', 'GetGlobalAngle', 'GetGlobalBool', 'GetGlobalEntity', 'GetGlobalFloat', 'GetGlobalInt', 'GetGlobalString', 'GetGlobalVar', 'GetGlobalVector', 'getmetatable', 'GetMountableContent', 'GetMountedContent', 'HSVToColor', 'HTTPGet', 'include', 'IncludeClientFile', 'ipairs', 'isDedicatedServer', 'IsEntity', 'IsFirstTimePredicted', 'IsPhysicsObject', 'IsValid', 'IsVector', 'KeyValuesToTable', 'KeyValuesToTablePreserveOrder', 'Lerp', 'LerpAngle', 'LerpVector', 'LocalToWorld', 'Matrix', 'MaxPlayers', 'MeshCube', 'MeshQuad', 'Model', 'module', 'Msg', 'MsgAll', 'MsgN', 'next', 'NullEntity', 'NumDownloadables', 'OrderVectors', 'pairs', 'ParticleEffect', 'ParticleEffectAttach', 'pcall', 'PCallError', 'PhysObject', 'Player', 'print', 'PrintTable', 'rawequal', 'rawget', 'rawset', 'RealTime', 'RememberCursorPosition', 'require', 'RestoreCursorPosition', 'RunConsoleCommand', 'RunString', 'SafeRemoveEntity', 'SafeRemoveEntityDelayed', 'select', 'SendUserMessage', 'setfenv', 'SetGlobalAngle', 'SetGlobalBool', 'SetGlobalEntity', 'SetGlobalFloat', 'SetGlobalInt', 'SetGlobalString', 'SetGlobalVar', 'SetGlobalVector', 'setmetatable', 'SetPhysConstraintSystem', 'SinglePlayer', 'SortedPairs', 'SortedPairsByMemberValue', 'SortedPairsByValue', 'Sound', 'SQLStr', 'STNDRD', 'SysTime', 'TableToKeyValues', 'tobool', 'tonumber', 'tostring', 'type', 'unpack', 'UnPredictedCurTime', 'UTIL_IsUselessModel', 'ValidEntity', 'Vector', 'VectorRand', 'Vertex', 'VGUIFrameTime', 'WorldSound', 'WorldToLocal', 'xpcall', 'AddOriginToPVS', 'ConditionName', 'DropEntityIfHeld', 'GetTaskID', 'GetWorldEntity', 'PrecacheScene', 'PrintMessage', 'RecipientFilter', 'SuppressHostEvents', 'AddWorldTip', 'ChangeTooltip', 'ClientsideModel', 'CloseDermaMenus', 'CreateContextMenu', 'CreateMaterial', 'CreateSprite', 'Derma_Anim', 'Derma_DrawBackgroundBlur', 'Derma_Hook', 'Derma_Install_Convar_Functions', 'Derma_Message', 'Derma_Query', 'Derma_StringRequest', 'DermaMenu', 'DisableClipping', 'DoBoneFingers', 'DoBoneInflators', 'DOF_Kill', 'DOF_Start', 'DOF_Think', 'DOFModeHack', 'DrawBloom', 'DrawColorModify', 'DrawMaterialOverlay', 'DrawMorph', 'DrawMotionBlur', 'DrawSharpen', 'DrawSunbeams', 'DynamicLight', 'EndTooltip', 'EyeAngles', 'EyePos', 'EyeVector', 'FindTooltip', 'FrameNumber', 'GetControlPanel', 'GetHUDPanel', 'GetRenderTarget', 'GetTooltipText', 'GetViewEntity', 'Label', 'LoadPresets', 'Localize', 'LocalPlayer', 'MakeBalloon', 'MakeNail', 'MakeSpawner', 'Material', 'ModelSearch', 'NamedColor', 'NewMesh', 'NumModelSkins', 'OnModelLoaded', 'ParticleEmitter', 'RealFrameTime', 'RebuildSearchCache', 'RegisterDermaMenuForClose', 'RenderAngles', 'RenderStereoscopy', 'RenderSuperDoF', 'SavePresets', 'ScreenScale', 'ScrH', 'ScrW', 'SetClipboardText', 'SetMaterialOverride', 'SpawnMenuEnableSave', 'SScale', 'TextEntryLoseFocus', 'UpdateRenderTarget', 'ValidPanel', 'VGUIRect' ),
        5 => array ( 'Activate', 'AlignAngles', 'BoundingRadius', 'CallOnRemove', 'ClearPoseParameters', 'DeleteOnRemove', 'DispatchTraceAttack', 'Disposition', 'DontDeleteOnRemove', 'DrawShadow', 'DropToFloor', 'EmitSound', 'EntIndex', 'Extinguish', 'EyeAngles', 'EyePos', 'Fire', 'FireBullets', 'GetActivity', 'GetAngles', 'GetAttachment', 'GetBodygroup', 'GetBoneMatrix', 'GetBonePosition', 'GetClass', 'GetCollisionGroup', 'GetColor', 'GetFlexBounds', 'GetFlexName', 'GetFlexNum', 'GetFlexScale', 'GetFlexWeight', 'GetForward', 'GetGroundEntity', 'GetKeyValues', 'GetLocalAngles', 'GetLocalPos', 'GetMaterial', 'GetMaxHealth', 'GetModel', 'GetMoveCollide', 'GetMoveParent', 'GetMoveType', 'GetName', 'GetNetworkedAngle', 'GetNetworkedBool', 'GetNetworkedEntity', 'GetNetworkedFloat', 'GetNetworkedInt', 'GetNetworkedString', 'GetNetworkedVar', 'GetNetworkedVector', 'GetNWAngle', 'GetNWBool', 'GetNWEntity', 'GetNWFloat', 'GetNWInt', 'GetNWString', 'GetNWVector', 'GetOwner', 'GetParent', 'GetParentPhysNum', 'GetPhysicsAttacker', 'GetPhysicsObject', 'GetPhysicsObjectCount', 'GetPhysicsObjectNum', 'GetPos', 'GetPoseParameter', 'GetRight', 'GetSequence', 'GetSkin', 'GetSolid', 'GetTable', 'GetUnFreezable', 'GetUp', 'GetVar', 'GetVelocity', 'GibBreakClient', 'GibBreakServer', 'HasSpawnFlags', 'Health', 'Ignite', 'Input', 'IsConstrained', 'IsInWorld', 'IsNPC', 'IsOnFire', 'IsOnGround', 'IsPlayer', 'IsPlayerHolding', 'IsValid', 'IsVehicle', 'IsWeapon', 'IsWorld', 'LocalToWorld', 'LocalToWorldAngles', 'LookupAttachment', 'LookupBone', 'LookupSequence', 'MakePhysicsObjectAShadow', 'MuzzleFlash', 'NearestPoint', 'NextThink', 'OBBCenter', 'OBBMaxs', 'OBBMins', 'OnGround', 'PhysicsFromMesh', 'PhysicsInit', 'PhysicsInitBox', 'PhysicsInitShadow', 'PhysicsInitSphere', 'PhysWake', 'PointAtEntity', 'PrecacheGibs', 'Remove', 'RemoveCallOnRemove', 'ResetSequence', 'ResetSequenceInfo', 'Respawn', 'RestartGesture', 'SelectWeightedSequence', 'SequenceDuration', 'SetAngles', 'SetAnimation', 'SetBodygroup', 'SetBoneMatrix', 'SetCollisionBounds', 'SetCollisionBoundsWS', 'SetCollisionGroup', 'SetColor', 'SetCycle', 'SetElasticity', 'SetEntity', 'SetEyeTarget', 'SetFlexScale', 'SetFlexWeight', 'SetFriction', 'SetGravity', 'SetGroundEntity', 'SetHealth', 'SetKeyValue', 'SetLocalAngles', 'SetLocalPos', 'SetLocalVelocity', 'SetMaterial', 'SetMaxHealth', 'SetModel', 'SetModelName', 'SetMoveCollide', 'SetMoveParent', 'SetMoveType', 'SetName', 'SetNetworkedAngle', 'SetNetworkedBool', 'SetNetworkedEntity', 'SetNetworkedFloat', 'SetNetworkedInt', 'SetNetworkedNumber', 'SetNetworkedString', 'SetNetworkedVar', 'SetNetworkedVarProxy', 'SetNetworkedVector', 'SetNoDraw', 'SetNotSolid', 'SetNWAngle', 'SetNWBool', 'SetNWEntity', 'SetNWFloat', 'SetNWInt', 'SetNWString', 'SetNWVector', 'SetOwner', 'SetParent', 'SetParentPhysNum', 'SetPhysConstraintObjects', 'SetPhysicsAttacker', 'SetPlaybackRate', 'SetPos', 'SetPoseParameter', 'SetRenderMode', 'SetSequence', 'SetShouldDrawInViewMode', 'SetSkin', 'SetSolid', 'SetSolidMask', 'SetTable', 'SetTrigger', 'SetUnFreezable', 'SetUseType', 'SetVar', 'SetVelocity', 'SkinCount', 'Spawn', 'StartLoopingSound', 'StartMotionController', 'StopLoopingSound', 'StopMotionController', 'StopParticles', 'StopSound', 'TakeDamage', 'TakePhysicsDamage', 'TranslatePhysBoneToBone', 'Visible', 'VisibleVec', 'WaterLevel', 'Weapon_SetActivity', 'Weapon_TranslateActivity', 'WorldSpaceAABB', 'WorldToLocal', 'WorldToLocalAngles', 'DrawModel', 'FrameAdvance', 'GetAnimTime', 'GetModelPhysBoneCount', 'GetModelScale', 'GetModelWorldScale', 'GetRenderAngles', 'GetRenderBounds', 'GetRenderOrigin', 'InitializeAsClientEntity', 'InvalidateBoneCache', 'SetAnimTime', 'SetBonePosition', 'SetModelScale', 'SetModelWorldScale', 'SetRenderAngles', 'SetRenderBounds', 'SetRenderBoundsWS', 'SetRenderOrigin', 'SetupBones' ),
                6 => array ( 'AddCleanup', 'AddCount', 'AddDeaths', 'AddFrags', 'AddFrozenPhysicsObject', 'Alive', 'AllowImmediateDecalPainting', 'Armor', 'ChatPrint', 'CheckLimit', 'ConCommand', 'CreateRagdoll', 'CrosshairDisable', 'CrosshairEnable', 'Crouching', 'Deaths', 'DebugInfo', 'DetonateTripmines', 'DrawViewModel', 'DrawWorldModel', 'DropNamedWeapon', 'DropWeapon', 'EnterVehicle', 'EquipSuit', 'ExitVehicle', 'Flashlight', 'FlashlightIsOn', 'Frags', 'Freeze', 'GetActiveWeapon', 'GetAIM', 'GetAimVector', 'GetAmmoCount', 'GetCanWalk', 'GetCanZoom', 'GetClientsideVehicle', 'GetCount', 'GetCurrentCommand', 'GetCursorAimVector', 'GetEmail', 'GetEyeTrace', 'GetEyeTraceNoCursor', 'GetFOV', 'GetGTalk', 'GetInfo', 'GetInfoNum', 'GetJumpPower', 'GetLocation', 'GetMaxSpeed', 'GetMSN', 'GetName', 'GetPData', 'GetRagdollEntity', 'GetScriptedVehicle', 'GetShootPos', 'GetStepSize', 'GetTool', 'GetVehicle', 'GetViewEntity', 'GetViewModel', 'GetWeapon', 'GetWeapons', 'GetWebsite', 'GetXFire', 'Give', 'GiveAmmo', 'GodDisable', 'GodEnable', 'HasWeapon', 'InVehicle', 'IPAddress', 'IsAdmin', 'IsConnected', 'IsListenServerHost', 'IsNPC', 'IsPlayer', 'IsSuperAdmin', 'IsUserGroup', 'IsVehicle', 'IsWeapon', 'KeyDown', 'KeyDownLast', 'KeyPressed', 'KeyReleased', 'Kill', 'KillSilent', 'LagCompensation', 'LastHitGroup', 'LimitHit', 'Lock', 'Name', 'Nick', 'PacketLoss', 'PhysgunUnfreeze', 'Ping', 'PrintMessage', 'RemoveAllAmmo', 'RemoveAmmo', 'SelectWeapon', 'SendHint', 'SendLua', 'SetAmmo', 'SetArmor', 'SetCanWalk', 'SetCanZoom', 'SetClientsideVehicle', 'SetCrouchedWalkSpeed', 'SetDeaths', 'SetDSP', 'SetDuckSpeed', 'SetEyeAngles', 'SetFOV', 'SetFrags', 'SetJumpPower', 'SetMaxSpeed', 'SetNoTarget', 'SetPData', 'SetRunSpeed', 'SetScriptedVehicle', 'SetStepSize', 'SetSuppressPickupNotices', 'SetTeam', 'SetUnDuckSpeed', 'SetUserGroup', 'SetViewEntity', 'SetWalkSpeed', 'ShouldDropWeapon', 'SnapEyeAngles', 'Spectate', 'SpectateEntity', 'SprintDisable', 'SprintEnable', 'SteamID', 'StopZooming', 'StripAmmo', 'StripWeapon', 'StripWeapons', 'SuppressHint', 'Team', 'TimeConnected', 'TraceHullAttack', 'UnfreezePhysicsObjects', 'UniqueID', 'UniqueIDTable', 'UnLock', 'UnSpectate', 'UserID', 'ViewPunch', 'IsMuted', 'IsSpeaking', 'IsVoiceAudible', 'SetMuted' ),
                7 => array ( 'ai_schedule.New', 'ai_task.New', 'cleanup.Add', 'cleanup.CC_AdminCleanup', 'cleanup.CC_Cleanup', 'cleanup.Register', 'cleanup.ReplaceEntity', 'concommand.Add', 'concommand.AutoComplete', 'concommand.Remove', 'concommand.Run', 'constraint.AddConstraintTable', 'constraint.AddConstraintTableNoDelete', 'constraint.AdvBallsocket', 'constraint.Axis', 'constraint.Ballsocket', 'constraint.CanConstrain', 'constraint.CreateKeyframeRope', 'constraint.CreateStaticAnchorPoint', 'constraint.Elastic', 'constraint.Find', 'constraint.FindConstraint', 'constraint.FindConstraintEntity', 'constraint.FindConstraints', 'constraint.ForgetConstraints', 'constraint.GetAllConstrainedEntities', 'constraint.GetTable', 'constraint.HasConstraints', 'constraint.Hydraulic', 'constraint.Keepupright', 'constraint.Motor', 'constraint.Muscle', 'constraint.NoCollide', 'constraint.Pulley', 'constraint.RemoveAll', 'constraint.RemoveConstraints', 'constraint.Rope', 'constraint.Slider', 'constraint.Weld', 'constraint.Winch', 'coroutine.create', 'coroutine.resume', 'coroutine.running', 'coroutine.status', 'coroutine.wrap', 'coroutine.yield', 'cvars.AddChangeCallback', 'cvars.GetConVarCallbacks', 'cvars.OnConVarChanged', 'debug.debug', 'debug.getfenv', 'debug.gethook', 'debug.getinfo', 'debug.getlocal', 'debug.getmetatable', 'debug.getregistry', 'debug.getupvalue', 'debug.setfenv', 'debug.sethook', 'debug.setlocal', 'debug.setmetatable', 'debug.setupvalue', 'debug.Trace', 'debug.traceback', 'debugoverlay.Box', 'debugoverlay.Cross', 'debugoverlay.Line', 'debugoverlay.Sphere', 'debugoverlay.Text', 'duplicator.ApplyBoneModifiers', 'duplicator.ApplyEntityModifiers', 'duplicator.ClearEntityModifier', 'duplicator.Copy', 'duplicator.CopyEntTable', 'duplicator.CreateConstraintFromTable', 'duplicator.CreateEntityFromTable', 'duplicator.DoFlex', 'duplicator.DoGeneric', 'duplicator.DoGenericPhysics', 'duplicator.FindEntityClass', 'duplicator.GenericDuplicatorFunction', 'duplicator.GetAllConstrainedEntitiesAndConstraints', 'duplicator.Paste', 'duplicator.RegisterBoneModifier', 'duplicator.RegisterConstraint', 'duplicator.RegisterEntityClass', 'duplicator.RegisterEntityModifier', 'duplicator.StoreBoneModifier', 'duplicator.StoreEntityModifier', 'ents.Create', 'ents.FindByClass', 'ents.FindByModel', 'ents.FindByName', 'ents.FindInBox', 'ents.FindInCone', 'ents.FindInSphere', 'ents.GetAll', 'ents.GetByIndex', 'file.CreateDir', 'file.Delete', 'file.Exists', 'file.ExistsEx', 'file.Find', 'file.FindDir', 'file.FindInLua', 'file.IsDir', 'file.Read', 'file.Rename', 'file.Size', 'file.TFind', 'file.Time', 'file.Write', 'filex.Append', 'game.ConsoleCommand', 'game.GetMap', 'game.GetMapNext', 'game.LoadNextMap', 'gamemode.Call', 'gamemode.Get', 'gamemode.Register', 'gmod.GetGamemode', 'hook.Add', 'hook.Call', 'hook.GetTable', 'hook.Remove', 'http.Get', 'list.Add', 'list.Get', 'list.GetForEdit', 'list.Set', 'math.abs', 'math.acos', 'math.AngleDifference', 'math.Approach', 'math.ApproachAngle', 'math.asin', 'math.atan', 'math.atan2', 'math.BinToInt', 'math.BSplinePoint', 'math.calcBSplineN', 'math.ceil', 'math.Clamp', 'math.cos', 'math.cosh', 'math.deg', 'math.Deg2Rad', 'math.Dist', 'math.Distance', 'math.EaseInOut', 'math.exp', 'math.floor', 'math.fmod', 'math.frexp', 'math.IntToBin', 'math.ldexp', 'math.log', 'math.log10', 'math.Max', 'math.max', 'math.min', 'math.Min', 'math.modf', 'math.NormalizeAngle', 'math.pow', 'math.rad', 'math.Rad2Deg', 'math.Rand', 'math.random', 'math.randomseed', 'math.Round', 'math.sin', 'math.sinh', 'math.sqrt', 'math.tan', 'math.tanh', 'math.TimeFraction', 'numpad.Activate', 'numpad.Deactivate', 'numpad.OnDown', 'numpad.OnUp', 'numpad.Register', 'numpad.Remove', 'os.clock', 'os.date', 'os.difftime', 'os.time', 'package.loadlib', 'package.seeall', 'player.GetAll', 'player.GetByID', 'player.GetByUniqueID', 'player_manager.AddValidModel', 'player_manager.TranslatePlayerModel', 'resource.AddFile', 'saverestore.AddRestoreHook', 'saverestore.AddSaveHook', 'saverestore.LoadEntity', 'saverestore.LoadGlobal', 'saverestore.PreRestore', 'saverestore.PreSave', 'saverestore.ReadTable', 'saverestore.ReadVar', 'saverestore.SaveEntity', 'saverestore.SaveGlobal', 'saverestore.WritableKeysInTable', 'saverestore.WriteTable', 'saverestore.WriteVar', 'schedule.Add', 'schedule.IsSchedule', 'schedule.Remove', 'scripted_ents.Get', 'scripted_ents.GetList', 'scripted_ents.GetSpawnable', 'scripted_ents.GetStored', 'scripted_ents.GetType', 'scripted_ents.Register', 'server_settings.Bool', 'server_settings.Int', 'sql.Begin', 'sql.Commit', 'sql.LastError', 'sql.Query', 'sql.QueryRow', 'sql.QueryValue', 'sql.SQLStr', 'sql.TableExists', 'table.Add', 'table.ClearKeys', 'table.CollapseKeyValue', 'table.concat', 'table.Copy', 'table.CopyFromTo', 'table.Count', 'table.DeSanitise', 'table.Empty', 'table.ForceInsert', 'table.foreach', 'table.foreachi', 'table.getn', 'table.HasValue', 'table.Inherit', 'table.insert', 'table.IsSequential', 'table.LowerKeyNames', 'table.maxn', 'table.Merge', 'table.remove', 'table.Sanitise', 'table.setn', 'table.sort', 'table.SortByKey', 'table.SortByMember', 'table.sortdesc', 'table.ToString', 'team.AddScore', 'team.GetAllTeams', 'team.GetColor', 'team.GetName', 'team.GetPlayers', 'team.GetScore', 'team.GetSpawnPoint', 'team.Joinable', 'team.NumPlayers', 'team.SetScore', 'team.SetSpawnPoint', 'team.SetUp', 'team.TotalDeaths', 'team.TotalFrags', 'timer.Adjust', 'timer.Check', 'timer.Create', 'timer.Destroy', 'timer.IsTimer', 'timer.Pause', 'timer.Remove', 'timer.Simple', 'timer.Start', 'timer.Stop', 'timer.Toggle', 'timer.UnPause', 'umsg.Angle', 'umsg.Bool', 'umsg.Char', 'umsg.End', 'umsg.Entity', 'umsg.Float', 'umsg.Long', 'umsg.PoolString', 'umsg.Short', 'umsg.Start', 'umsg.String', 'umsg.Vector', 'umsg.VectorNormal', 'undo.AddEntity', 'undo.AddFunction', 'undo.Create', 'undo.Do_Undo', 'undo.Finish', 'undo.ReplaceEntity', 'undo.SetCustomUndoText', 'undo.SetPlayer', 'usermessage.Hook', 'usermessage.IncomingMessage', 'util.BlastDamage', 'util.CRC', 'util.Decal', 'util.DecalMaterial', 'util.Effect', 'util.GetModelInfo', 'util.GetPlayerTrace', 'util.GetSurfaceIndex', 'util.IsInWorld', 'util.IsValidModel', 'util.IsValidPhysicsObject', 'util.IsValidProp', 'util.IsValidRagdoll', 'util.KeyValuesToTable', 'util.LocalToWorld', 'util.PointContents', 'util.PrecacheModel', 'util.PrecacheSound', 'util.QuickTrace', 'util.RelativePathToFull', 'util.ScreenShake', 'util.SpriteTrail', 'util.TableToKeyValues', 'util.tobool', 'util.TraceEntity', 'util.TraceEntityHull', 'util.TraceLine', 'vehicles.Add', 'vehicles.GetTable', 'vehicles.PlayerSpawn', 'vehicles.RefreshList', 'weapons.Get', 'weapons.GetList', 'weapons.GetStored', 'weapons.Register', 'avi.End', 'avi.GrabFrame', 'avi.Start', 'cam.End2D', 'cam.End3D', 'cam.End3D2D', 'cam.EndCameraPos', 'cam.EndOrthoView', 'cam.IgnoreZ', 'cam.PopModelMatrix', 'cam.PushModelMatrix', 'cam.Start2D', 'cam.Start3D', 'cam.Start3D2D', 'cam.StartCameraPos', 'cam.StartMaterialOverride', 'cam.StartOrthoView', 'cleanup.UpdateUI', 'ComboBox_Emitter_Options.bloodimpact', 'ComboBox_Emitter_Options.glassimpact', 'ComboBox_Emitter_Options.metalsparks', 'ComboBox_Emitter_Options.muzzle', 'ComboBox_Emitter_Options.muzzlebig', 'ComboBox_Emitter_Options.pistol shell', 'ComboBox_Emitter_Options.rifle shell', 'ComboBox_Emitter_Options.shotgun shell', 'ComboBox_Emitter_Options.small_sparks', 'ComboBox_Emitter_Options.sparks', 'ComboBox_Emitter_Options.striderblood', 'controlpanel.Get', 'cookie.Delete', 'cookie.GetNumber', 'cookie.GetString', 'cookie.Set', 'derma.Color', 'derma.DefineControl', 'derma.DefineSkin', 'derma.GetControlList', 'derma.GetDefaultSkin', 'derma.GetNamedSkin', 'derma.GetSkinTable', 'derma.SkinChangeIndex', 'derma.SkinHook', 'derma.SkinTexture', 'draw.DrawText', 'draw.GetFontHeight', 'draw.NoTexture', 'draw.RoundedBox', 'draw.SimpleText', 'draw.SimpleTextOutlined', 'draw.Text', 'draw.TextShadow', 'draw.TexturedQuad', 'draw.WordBox', 'effects.Create', 'effects.Register', 'gui.EnableScreenClicker', 'gui.MousePos', 'gui.MouseX', 'gui.MouseY', 'gui.ScreenToVector', 'gui.SetMousePos', 'input.IsKeyDown', 'input.IsMouseDown', 'input.SetCursorPos', 'input.WasKeyPressed', 'input.WasKeyReleased', 'input.WasKeyTyped', 'input.WasMouseDoublePressed', 'input.WasMousePressed', 'killicon.Add', 'killicon.AddAlias', 'killicon.AddFont', 'killicon.Draw', 'killicon.GetSize', 'language.Add', 'markup.Parse', 'mtable.Add', 'mtable.Clear', 'mtable.Init', 'mtable.OnStore', 'mtable.PerformLayout', 'mtable.Populate', 'presets.Add', 'presets.GetTable', 'presets.Remove', 'presets.Rename', 'render.AddBeam', 'render.Clear', 'render.ClearDepth', 'render.ClearRenderTarget', 'render.CopyRenderTargetToTexture', 'render.CopyTexture', 'render.DrawBeam', 'render.DrawQuad', 'render.DrawQuadEasy', 'render.DrawScreenQuad', 'render.DrawSprite', 'render.EndBeam', 'render.GetBloomTex0', 'render.GetBloomTex1', 'render.GetDXLevel', 'render.GetFullScreenDepthTexture', 'render.GetLightColor', 'render.GetMoBlurTex0', 'render.GetMorphTex0', 'render.GetMorphTex1', 'render.GetRenderTarget', 'render.GetScreenEffectTexture', 'render.GetSuperFPTex', 'render.GetSuperFPTex2', 'render.GetSurfaceColor', 'render.MaxTextureHeight', 'render.MaxTextureWidth', 'render.RenderView', 'render.ResetModelLighting', 'render.SetAmbientLight', 'render.SetBlend', 'render.SetColorModulation', 'render.SetLightingOrigin', 'render.SetMaterial', 'render.SetModelLighting', 'render.SetRenderTarget', 'render.SetViewPort', 'render.StartBeam', 'render.SupportsHDR', 'render.SupportsPixelShaders_1_4', 'render.SupportsPixelShaders_2_0', 'render.SupportsVertexShaders_2_0', 'render.SuppressEngineLighting', 'render.UpdateFullScreenDepthTexture', 'render.UpdateRefractTexture', 'render.UpdateScreenEffectTexture', 'spawnmenu.AddContext', 'spawnmenu.AddCreationTab', 'spawnmenu.AddProp', 'spawnmenu.AddPropCategory', 'spawnmenu.AddTab', 'spawnmenu.AddToolCategory', 'spawnmenu.AddToolMenuOption', 'spawnmenu.AddToolTab', 'spawnmenu.ClearToolMenus', 'spawnmenu.DeletePropCategory', 'spawnmenu.EmptyPropCategory', 'spawnmenu.GetCreationTabs', 'spawnmenu.GetPropCategoryTable', 'spawnmenu.GetPropTable', 'spawnmenu.GetToolMenu', 'spawnmenu.GetTools', 'spawnmenu.PopulateFromEngineTextFiles', 'spawnmenu.PopulateFromTextFiles', 'spawnmenu.RemoveProp', 'spawnmenu.RenamePropCategory', 'spawnmenu.SaveProps', 'spawnmenu.SaveToTextFiles', 'surface.CreateFont', 'surface.DrawLine', 'surface.DrawOutlinedRect', 'surface.DrawPoly', 'surface.DrawRect', 'surface.DrawText', 'surface.DrawTexturedRect', 'surface.DrawTexturedRectRotated', 'surface.GetHUDTexture', 'surface.GetTextSize', 'surface.GetTextureID', 'surface.GetTextureSize', 'surface.PlaySound', 'surface.ScreenHeight', 'surface.ScreenWidth', 'surface.SetDrawColor', 'surface.SetFont', 'surface.SetMaterial', 'surface.SetTextColor', 'surface.SetTextPos', 'surface.SetTexture', 'undo.MakeUIDirty', 'undo.SetupUI', 'util.PixelVisible', 'vgui.Create', 'vgui.CreateFromTable', 'vgui.CreateX', 'vgui.CursorVisible', 'vgui.FocusedHasParent', 'vgui.GetKeyboardFocus', 'vgui.GetWorldPanel', 'vgui.IsHoveringWorld', 'vgui.Register', 'vgui.RegisterFile', 'vgui.RegisterTable' ),
                
                ),
    'SYMBOLS' => array(
        '(', ')', '{', '}', '!', '@', '%', '&', '*', '|', '/', '<', '>', '=', ';', ':'
        ),
    'CASE_SENSITIVE' => array(
        GESHI_COMMENTS => false,
        1 => true,
                2 => true,
                3 => true,
                4 => true,
                5 => true,
                6 => true,
                7 => true,
        ),
    'STYLES' => array(
        'KEYWORDS' => array(
            1 => 'color: #0d2668;',
                        2 => 'color: #3951c1;',
                        3 => 'color: #3951c1;',
                        4 => 'color: #3951c1;',
                        5 => 'color: #3951c1;',
                        6 => 'color: #3951c1;',
                        7 => 'color: #3951c1;',
            ),
        'COMMENTS' => array(
            1 => 'color: #09ad05; font-style: italic; font-family: Trebuchet MS, Courier New, Courier;',
                        2 =>  'color: #09ad05; font-style: italic; font-family: Comic Sans MS, Courier New, Courier;',
            'MULTI' => 'color: #09ad05; font-style: italic; font-family: Comic Sans MS, Courier New, Courier;'
            ),
        'ESCAPE_CHAR' => array(
            0 => 'font-weight: bold;'
            ),
        'BRACKETS' => array(
            0 => 'color: #66cc66;'
            ),
        'STRINGS' => array(
            0 => 'color: #fa492c;'
            ),
        'NUMBERS' => array(
            0 => 'color: #cc66cc;'
            ),
        'METHODS' => array(
            0 => 'color: #b1b100;'
            ),
        'SYMBOLS' => array(
            0 => 'color: #66cc66;'
            ),
        'REGEXPS' => array(
            ),
        'SCRIPT' => array(
            )
        ),
    'URLS' => array(
        2 => 'http://wiki.garrysmod.com/?title={FNAME}',
                3 => 'http://www.lua.org/manual/5.1/manual.html#pdf-{FNAME}',
                4 => 'http://wiki.garrysmod.com/?title=G.{FNAME}',
                5 => 'http://wiki.garrysmod.com/?title=Entity.{FNAME}',
                6 => 'http://wiki.garrysmod.com/?title=Player.{FNAME}',
                7 => 'http://wiki.garrysmod.com/?title={FNAME}',
        ),
    'OOLANG' => true,
    'OBJECT_SPLITTERS' => array(
                        1 => ":",
                        2 => "."
        ),
    'REGEXPS' => array(
        ),
    'STRICT_MODE_APPLIES' => GESHI_NEVER,
    'SCRIPT_DELIMITERS' => array(
        ),
    'HIGHLIGHT_STRICT_BLOCK' => array(
        )
);

?>